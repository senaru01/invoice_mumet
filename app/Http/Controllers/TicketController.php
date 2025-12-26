<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->id())
            ->with('invoices')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        // Get available POs for this supplier
        $purchaseOrders = PurchaseOrder::where('supplier_id', auth()->id())
            ->whereIn('status', ['open', 'partial'])
            ->with(['items' => function($query) {
                $query->where('remaining_quantity', '>', 0);
            }])
            ->get();

        return view('tickets.create', compact('purchaseOrders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'delivery_date' => 'required|date',
            'has_po' => 'boolean',
            'has_faktur_pajak' => 'boolean',
            'has_surat_jalan' => 'boolean',
            'has_invoice_doc' => 'boolean',
            'document_notes' => 'nullable|string',
            'po_invoices' => 'required|array|min:1',
            'po_invoices.*.purchase_order_id' => 'required|exists:purchase_orders,id',
            'po_invoices.*.invoice_number' => 'required|string',
            'po_invoices.*.tax_invoice_number' => 'nullable|string',
            'po_invoices.*.invoice_date' => 'required|date',
            'po_invoices.*.items' => 'required|array|min:1',
            'po_invoices.*.items.*.po_item_id' => 'required|exists:purchase_order_items,id',
            'po_invoices.*.items.*.quantity' => 'required|numeric|min:0.01',
            'po_invoices.*.items.*.payment_type' => 'required|in:full,dp,termin_2,pelunasan',
            'po_invoices.*.items.*.payment_percentage' => 'nullable|numeric|min:0|max:100',
        ]);

        try {
            DB::beginTransaction();

            // Get company_id from authenticated user
            $user = auth()->user();
            
            // Create ticket with user_id and company_id
            $ticket = Ticket::create([
                'user_id' => $user->id,
                'company_id' => $user->company_id ?? null,
                'planned_delivery_date' => $request->delivery_date,
                'has_invoice' => $request->has_invoice_doc ?? true,
                'has_faktur_pajak' => $request->has_faktur_pajak ?? false,
                'has_surat_jalan' => $request->has_surat_jalan ?? false,
                'has_po' => $request->has_po ?? true,
                'document_notes' => $request->document_notes,
                'status' => 'pending'
            ]);

            // Process each PO invoice
            foreach ($request->po_invoices as $poInvoiceData) {
                $po = PurchaseOrder::findOrFail($poInvoiceData['purchase_order_id']);
                
                // Verify PO belongs to supplier
                if ($po->supplier_id != auth()->id()) {
                    throw new \Exception('PO tidak valid!');
                }

                // Calculate amounts - separate barang and jasa
                $barangTotal = 0;
                $jasaTotal = 0;
                $invoiceItems = [];

                foreach ($poInvoiceData['items'] as $item) {
                    $poItem = PurchaseOrderItem::findOrFail($item['po_item_id']);
                    
                    // Calculate item total based on payment type
                    $itemQuantity = $item['quantity'];
                    $baseTotal = $poItem->unit_price * $itemQuantity;
                    
                    // If payment is partial (DP/Termin), calculate percentage
                    $paymentPercentage = 100;
                    if (in_array($item['payment_type'], ['dp', 'termin_2'])) {
                        $paymentPercentage = $item['payment_percentage'] ?? 100;
                        $baseTotal = ($baseTotal * $paymentPercentage) / 100;
                    }
                    
                    // Separate by transaction type
                    if ($poItem->transaction_type === 'jasa') {
                        $jasaTotal += $baseTotal;
                    } else {
                        $barangTotal += $baseTotal;
                    }

                    $invoiceItems[] = [
                        'po_item' => $poItem,
                        'quantity' => $itemQuantity,
                        'total_price' => $baseTotal,
                        'payment_type' => $item['payment_type'],
                        'payment_percentage' => $paymentPercentage
                    ];
                }

                // Create invoice with separated amounts
                $invoice = Invoice::create([
                    'ticket_id' => $ticket->id,
                    'purchase_order_id' => $po->id,
                    'invoice_number' => $poInvoiceData['invoice_number'],
                    'no_seri_fp' => $poInvoiceData['tax_invoice_number'] ?? null,
                    'tax_invoice_number' => $poInvoiceData['tax_invoice_number'] ?? null,
                    'invoice_date' => $poInvoiceData['invoice_date'],
                    'currency' => 'IDR',
                    'barang' => $barangTotal,
                    'jasa' => $jasaTotal,
                    'discount' => 0,
                ]);

                // Auto calculate amounts using model method
                $invoice->calculateAmounts();
                $invoice->save();

                // Create invoice items (jika perlu tracking detail)
                foreach ($invoiceItems as $itemData) {
                    $poItem = $itemData['po_item'];
                    
                    InvoiceItem::create([
                        'invoice_id' => $invoice->id,
                        'purchase_order_item_id' => $poItem->id,
                        'part_name' => $poItem->part_name,
                        'specification' => $poItem->specification,
                        'quantity' => $itemData['quantity'],
                        'unit' => $poItem->unit,
                        'unit_price' => $poItem->unit_price,
                        'total_price' => $itemData['total_price'],
                        'payment_type' => $itemData['payment_type'],
                        'payment_percentage' => $itemData['payment_percentage']
                    ]);

                    // Update PO item quantities only for full payment or pelunasan
                    if (in_array($itemData['payment_type'], ['full', 'pelunasan'])) {
                        $poItem->updateInvoicedQuantity();
                    }
                }

                // Update PO status
                $po->updateStatus();
            }

            DB::commit();

            return redirect()->route('tickets.show', $ticket)
                ->with('success', 'Tiket berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function show(Ticket $ticket)
    {
        // Ensure supplier can only see their own tickets
        if ($ticket->user_id != auth()->id()) {
            abort(403);
        }

        $ticket->load(['invoices.items.purchaseOrderItem', 'company', 'user']);
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Print ticket for delivery
     */
    public function print(Ticket $ticket)
    {
        // Ensure supplier can only print their own tickets
        if ($ticket->user_id != auth()->id()) {
            abort(403);
        }

        $ticket->load(['invoices', 'company', 'user']);
        return view('tickets.print', compact('ticket'));
    }
}