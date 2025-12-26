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

    /**
     * Preview ticket before final submission
     */
    public function preview(Request $request)
    {
        $request->validate([
            'delivery_date' => 'required|date',
            'has_po' => 'boolean',
            'has_faktur_pajak' => 'boolean',
            'has_surat_jalan' => 'boolean',
            'has_invoice_doc' => 'boolean',
            'document_notes' => 'nullable|string',
            'po_invoices' => 'required|array|min:1',
        ]);

        // Process data untuk preview
        $previewData = $this->processTicketData($request);
        
        // Store request data in session untuk nanti submit
        session(['ticket_draft' => $request->all()]);

        return view('tickets.preview', $previewData);
    }

    /**
     * Save as draft
     */
    public function saveDraft(Request $request)
    {
        // Get data from session (set by preview)
        $data = session('ticket_draft');
        
        if (!$data) {
            return redirect()->route('tickets.create')
                ->with('error', 'Data tidak ditemukan. Silakan isi form lagi.');
        }

        // Create new request from session data
        $request = new Request($data);
        
        try {
            DB::beginTransaction();

            $user = auth()->user();
            
            // Create ticket as draft
            $ticket = Ticket::create([
                'user_id' => $user->id,
                'company_id' => $user->company_id ?? null,
                'planned_delivery_date' => $request->delivery_date,
                'has_invoice' => $request->has_invoice_doc ?? true,
                'has_faktur_pajak' => $request->has_faktur_pajak ?? false,
                'has_surat_jalan' => $request->has_surat_jalan ?? false,
                'has_po' => $request->has_po ?? true,
                'document_notes' => $request->document_notes,
                'status' => 'draft'  // Status: draft
            ]);

            // Create invoices but don't update PO quantities yet
            $this->createInvoices($ticket, $request, false);

            DB::commit();

            return redirect()->route('tickets.edit', $ticket)
                ->with('success', 'Draft tiket berhasil disimpan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Store and submit ticket
     */
    public function store(Request $request)
    {
        // Get data from session (set by preview)
        $data = session('ticket_draft');
        
        if (!$data) {
            return redirect()->route('tickets.create')
                ->with('error', 'Data tidak ditemukan. Silakan isi form lagi.');
        }

        // Create new request from session data
        $request = new Request($data);
        
        $request->validate([
            'delivery_date' => 'required|date',
            'po_invoices' => 'required|array|min:1',
            'po_invoices.*.purchase_order_id' => 'required|exists:purchase_orders,id',
            'po_invoices.*.invoice_number' => 'required|string',
            'po_invoices.*.items' => 'required|array|min:1',
        ]);

        try {
            DB::beginTransaction();

            $user = auth()->user();
            
            // Create ticket as submitted
            $ticket = Ticket::create([
                'user_id' => $user->id,
                'company_id' => $user->company_id ?? null,
                'planned_delivery_date' => $request->delivery_date,
                'has_invoice' => $request->has_invoice_doc ?? true,
                'has_faktur_pajak' => $request->has_faktur_pajak ?? false,
                'has_surat_jalan' => $request->has_surat_jalan ?? false,
                'has_po' => $request->has_po ?? true,
                'document_notes' => $request->document_notes,
                'status' => 'submitted'  // Status: submitted
            ]);

            // Create invoices and update PO quantities
            $this->createInvoices($ticket, $request, true);

            DB::commit();

            // Clear draft session
            session()->forget('ticket_draft');

            return redirect()->route('tickets.index')
                ->with('success', 'Tiket berhasil disubmit!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Helper: Create invoices
     */
    private function createInvoices(Ticket $ticket, Request $request, bool $updatePO = true)
    {
        foreach ($request->po_invoices as $poInvoiceData) {
            $po = PurchaseOrder::findOrFail($poInvoiceData['purchase_order_id']);
            
            if ($po->supplier_id != auth()->id()) {
                throw new \Exception('PO tidak valid!');
            }

            $barangTotal = 0;
            $jasaTotal = 0;
            $invoiceItems = [];

            foreach ($poInvoiceData['items'] as $item) {
                $poItem = PurchaseOrderItem::findOrFail($item['po_item_id']);
                
                $itemQuantity = $item['quantity'];
                $baseTotal = $poItem->unit_price * $itemQuantity;
                
                $paymentPercentage = 100;
                if (in_array($item['payment_type'], ['dp', 'termin_2'])) {
                    $paymentPercentage = $item['payment_percentage'] ?? 100;
                    $baseTotal = ($baseTotal * $paymentPercentage) / 100;
                }
                
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

            $invoice->calculateAmounts();
            $invoice->save();

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

                // Only update PO if not draft
                if ($updatePO) {
                    if ($itemData['payment_type'] === 'full' || 
                        $itemData['payment_type'] === 'pelunasan') {
                        $poItem->invoiced_quantity = $poItem->quantity;
                        $poItem->remaining_quantity = 0;
                        $poItem->save();
                    }
                }
            }

            if ($updatePO) {
                $po->updateStatus();
            }
        }
    }

    /**
     * Helper: Process ticket data for preview
     */
    private function processTicketData(Request $request)
    {
        $poInvoices = [];
        
        foreach ($request->po_invoices as $poInvoiceData) {
            $po = PurchaseOrder::with('items')->findOrFail($poInvoiceData['purchase_order_id']);
            
            $barangTotal = 0;
            $jasaTotal = 0;
            $items = [];

            foreach ($poInvoiceData['items'] as $itemData) {
                $poItem = PurchaseOrderItem::find($itemData['po_item_id']);
                
                $quantity = $itemData['quantity'];
                $baseTotal = $poItem->unit_price * $quantity;
                
                $paymentPercentage = 100;
                if (in_array($itemData['payment_type'], ['dp', 'termin_2'])) {
                    $paymentPercentage = $itemData['payment_percentage'] ?? 100;
                    $baseTotal = ($baseTotal * $paymentPercentage) / 100;
                }
                
                if ($poItem->transaction_type === 'jasa') {
                    $jasaTotal += $baseTotal;
                } else {
                    $barangTotal += $baseTotal;
                }

                $items[] = [
                    'part_name' => $poItem->part_name,
                    'specification' => $poItem->specification,
                    'quantity' => $quantity,
                    'unit' => $poItem->unit,
                    'unit_price' => $poItem->unit_price,
                    'total_price' => $baseTotal,
                    'payment_type' => $itemData['payment_type'],
                    'payment_percentage' => $paymentPercentage,
                    'transaction_type' => $poItem->transaction_type,
                ];
            }

            $subtotal1 = $barangTotal + $jasaTotal;
            $tax = $subtotal1 * 0.11;
            $subtotal2 = $subtotal1 + $tax;
            $pph23 = $jasaTotal * 0.02;
            $grandTotal = $subtotal2 + $pph23;

            $poInvoices[] = [
                'po' => $po,
                'invoice_number' => $poInvoiceData['invoice_number'],
                'tax_invoice_number' => $poInvoiceData['tax_invoice_number'] ?? null,
                'invoice_date' => $poInvoiceData['invoice_date'],
                'items' => $items,
                'barang' => $barangTotal,
                'jasa' => $jasaTotal,
                'subtotal1' => $subtotal1,
                'tax' => $tax,
                'subtotal2' => $subtotal2,
                'pph23' => $pph23,
                'grand_total' => $grandTotal,
            ];
        }

        return [
            'ticketData' => $request->all(),
            'poInvoices' => $poInvoices,
        ];
    }

    public function show(Ticket $ticket)
    {
        if ($ticket->user_id != auth()->id()) {
            abort(403);
        }

        $ticket->load(['invoices.items.purchaseOrderItem', 'company', 'user']);
        return view('tickets.show', compact('ticket'));
    }

    public function print(Ticket $ticket)
    {
        if ($ticket->user_id != auth()->id()) {
            abort(403);
        }

        $ticket->load(['invoices', 'company', 'user']);
        return view('tickets.print', compact('ticket'));
    }

    /**
     * Edit draft ticket
     */
    public function edit(Ticket $ticket)
    {
        if ($ticket->user_id != auth()->id()) {
            abort(403);
        }

        if ($ticket->status !== 'draft') {
            return redirect()->route('tickets.show', $ticket)
                ->with('error', 'Hanya draft yang bisa diedit!');
        }

        // Load existing data
        $purchaseOrders = PurchaseOrder::where('supplier_id', auth()->id())
            ->whereIn('status', ['open', 'partial'])
            ->with(['items' => function($query) {
                $query->where('remaining_quantity', '>', 0);
            }])
            ->get();

        $ticket->load('invoices.items');

        return view('tickets.edit', compact('ticket', 'purchaseOrders'));
    }

    /**
     * Update draft ticket
     */
    public function update(Request $request, Ticket $ticket)
    {
        if ($ticket->user_id != auth()->id()) {
            abort(403);
        }

        if ($ticket->status !== 'draft') {
            return redirect()->route('tickets.show', $ticket)
                ->with('error', 'Hanya draft yang bisa diupdate!');
        }

        try {
            DB::beginTransaction();

            // Delete old invoices
            foreach ($ticket->invoices as $invoice) {
                $invoice->items()->delete();
                $invoice->delete();
            }

            // Update ticket
            $ticket->update([
                'planned_delivery_date' => $request->delivery_date,
                'has_invoice' => $request->has_invoice_doc ?? true,
                'has_faktur_pajak' => $request->has_faktur_pajak ?? false,
                'has_surat_jalan' => $request->has_surat_jalan ?? false,
                'has_po' => $request->has_po ?? true,
                'document_notes' => $request->document_notes,
            ]);

            // Recreate invoices
            $this->createInvoices($ticket, $request, false);

            DB::commit();

            return redirect()->route('tickets.edit', $ticket)
                ->with('success', 'Draft berhasil diupdate!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    /**
     * Submit draft ticket
     */
    public function submitDraft(Ticket $ticket)
    {
        if ($ticket->user_id != auth()->id()) {
            abort(403);
        }

        if ($ticket->status !== 'draft') {
            return redirect()->route('tickets.show', $ticket)
                ->with('error', 'Tiket sudah disubmit!');
        }

        try {
            DB::beginTransaction();

            // Update status to submitted
            $ticket->update(['status' => 'submitted']);

            // Update PO quantities
            foreach ($ticket->invoices as $invoice) {
                foreach ($invoice->items as $item) {
                    if ($item->payment_type === 'full' || $item->payment_type === 'pelunasan') {
                        $poItem = $item->purchaseOrderItem;
                        $poItem->invoiced_quantity = $poItem->quantity;
                        $poItem->remaining_quantity = 0;
                        $poItem->save();
                    }
                }
                
                $invoice->purchaseOrder->updateStatus();
            }

            DB::commit();

            return redirect()->route('tickets.index')
                ->with('success', 'Tiket berhasil disubmit!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}