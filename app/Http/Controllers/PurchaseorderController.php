<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $pos = PurchaseOrder::with('supplier', 'items')
            ->orderBy('po_date', 'desc')
            ->paginate(20);

        return view('admin.po-index', compact('pos'));
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->load('supplier', 'items.invoiceItems', 'invoices');
        return view('admin.po-show', compact('purchaseOrder'));
    }

    public function import()
    {
        return view('admin.po-import');
    }

    public function processImport(Request $request)
    {
        $request->validate([
            'po_file' => 'required|file|mimes:xlsx,xls'
        ]);

        try {
            DB::beginTransaction();

            $file = $request->file('po_file');
            $spreadsheet = IOFactory::load($file->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            // Skip header row
            array_shift($rows);

            $poGroups = [];
            $importStats = [
                'total_pos' => 0,
                'skipped_pos' => 0,
                'new_suppliers' => 0,
                'errors' => []
            ];

            foreach ($rows as $rowIndex => $row) {
                if (empty($row[0])) continue; // Skip empty rows

                // Convert PO Number to string (handle Excel auto-formatting)
                $poNumber = $this->sanitizeValue($row[0]);
                $supplierName = $row[8] ?? null; // Kolom ke-9 untuk Supplier Name

                if (empty($supplierName)) {
                    $importStats['errors'][] = "Baris " . ($rowIndex + 2) . ": Supplier name kosong untuk PO {$poNumber}";
                    continue;
                }

                if (!isset($poGroups[$poNumber])) {
                    $poGroups[$poNumber] = [
                        'po_date' => $this->parseDate($row[1]),
                        'supplier_name' => trim($supplierName),
                        'items' => []
                    ];
                }

                $poGroups[$poNumber]['items'][] = [
                    'part_name' => $this->sanitizeValue($row[2]),
                    'specification' => $this->sanitizeValue($row[3]),
                    'quantity' => $this->sanitizeNumber($row[4]),
                    'unit' => $this->sanitizeValue($row[5]),
                    'unit_price' => $this->sanitizeNumber($row[6]),
                    'total_price' => $this->sanitizeNumber($row[7]),
                    'transaction_type' => strtolower($this->sanitizeValue($row[9] ?? 'barang')) // Kolom 10
                ];
            }

            foreach ($poGroups as $poNumber => $poData) {
                // Check if PO already exists
                $existingPO = PurchaseOrder::where('po_number', $poNumber)->first();
                if ($existingPO) {
                    $importStats['skipped_pos']++;
                    continue; // Skip duplicate PO
                }

                // Find or create supplier
                $supplier = $this->findOrCreateSupplier($poData['supplier_name']);
                
                if (!$supplier) {
                    $importStats['errors'][] = "PO {$poNumber}: Gagal membuat/menemukan supplier {$poData['supplier_name']}";
                    continue;
                }

                // Calculate totals
                $subtotal = collect($poData['items'])->sum('total_price');
                $ppnAmount = $subtotal * 0.11;
                $pph23Amount = $subtotal * 0.02;
                $totalAmount = $subtotal + $ppnAmount - $pph23Amount;

                // Create PO
                $po = PurchaseOrder::create([
                    'po_number' => $poNumber,
                    'po_date' => $poData['po_date'],
                    'supplier_id' => $supplier->id,
                    'subtotal' => $subtotal,
                    'ppn_amount' => $ppnAmount,
                    'pph23_amount' => $pph23Amount,
                    'total_amount' => $totalAmount,
                    'status' => 'open'
                ]);

                // Create PO Items
                foreach ($poData['items'] as $item) {
                    PurchaseOrderItem::create([
                        'purchase_order_id' => $po->id,
                        'part_name' => $item['part_name'],
                        'specification' => $item['specification'],
                        'quantity' => $item['quantity'],
                        'invoiced_quantity' => 0,
                        'remaining_quantity' => $item['quantity'],
                        'unit' => $item['unit'],
                        'unit_price' => $item['unit_price'],
                        'total_price' => $item['total_price'],
                        'transaction_type' => $item['transaction_type']
                    ]);
                }

                $importStats['total_pos']++;
            }

            DB::commit();

            // Build success message
            $message = "Import selesai! ";
            $message .= "{$importStats['total_pos']} PO berhasil diimport. ";
            
            if ($importStats['skipped_pos'] > 0) {
                $message .= "{$importStats['skipped_pos']} PO di-skip (duplikat). ";
            }
            
            if (count($importStats['errors']) > 0) {
                $message .= "Errors: " . implode(', ', $importStats['errors']);
            }

            return redirect()->route('admin.purchase-orders.index')
                ->with('success', $message);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal import PO: ' . $e->getMessage());
        }
    }

    /**
     * Find existing supplier or create new one
     */
    private function findOrCreateSupplier($supplierName)
    {
        // First, try to find existing company
        $company = Company::where('name', 'LIKE', "%{$supplierName}%")->first();
        
        if ($company) {
            // Find user with this company
            $supplier = User::where('company_id', $company->id)
                ->where('role', 'supplier')
                ->first();
            
            if ($supplier) {
                return $supplier;
            }
        }

        // If not found, create new company and user
        try {
            $company = Company::create([
                'name' => $supplierName,
                'description' => 'Auto-created from PO import'
            ]);

            // Create default user for this supplier
            $supplier = User::create([
                'name' => $supplierName,
                'email' => strtolower(str_replace(' ', '.', $supplierName)) . '@supplier.auto',
                'password' => bcrypt('password'), // Default password
                'role' => 'supplier',
                'company_id' => $company->id
            ]);

            return $supplier;

        } catch (\Exception $e) {
            \Log::error("Failed to create supplier: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Sanitize value from Excel (handle different formats)
     */
    private function sanitizeValue($value)
    {
        if (is_null($value)) return '';
        
        // If it's an object (DateTime), convert to string
        if (is_object($value)) {
            if ($value instanceof \DateTime) {
                return $value->format('Y-m-d');
            }
            return (string) $value;
        }
        
        return trim((string) $value);
    }

    /**
     * Sanitize number from Excel
     */
    private function sanitizeNumber($value)
    {
        if (is_null($value) || $value === '') return 0;
        
        // Remove any non-numeric characters except dot and minus
        $cleaned = preg_replace('/[^0-9.\-]/', '', $value);
        
        return (float) $cleaned;
    }

    /**
     * Parse date from Excel (handle various formats)
     */
    private function parseDate($value)
    {
        if (is_null($value)) return now();
        
        // If it's already a DateTime object
        if ($value instanceof \DateTime) {
            return $value->format('Y-m-d');
        }
        
        // If it's an Excel serial date number
        if (is_numeric($value)) {
            try {
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
                return $date->format('Y-m-d');
            } catch (\Exception $e) {
                return now()->format('Y-m-d');
            }
        }
        
        // Try to parse as string date
        try {
            return \Carbon\Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            return now()->format('Y-m-d');
        }
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        // Check if PO has invoices
        if ($purchaseOrder->invoices()->count() > 0) {
            return back()->with('error', 'PO tidak dapat dihapus karena sudah ada invoice!');
        }

        $purchaseOrder->delete();
        return redirect()->route('admin.purchase-orders.index')
            ->with('success', 'PO berhasil dihapus!');
    }
}