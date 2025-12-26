<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['company', 'invoices'])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $companies = Company::where('is_active', true)->get();
        return view('tickets.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'planned_delivery_date' => 'required|date|after_or_equal:today',
            'has_invoice' => 'boolean',
            'has_faktur_pajak' => 'boolean',
            'has_surat_jalan' => 'boolean',
            'has_po' => 'boolean',
            'document_notes' => 'nullable|string',
            'invoices' => 'required|array|min:1',
            'invoices.*.no_seri_fp' => 'required|string',
            'invoices.*.invoice_number' => 'required|string',
            'invoices.*.invoice_date' => 'required|date',
            'invoices.*.currency' => 'required|string|max:3',
            'invoices.*.barang' => 'required|numeric|min:0',
            'invoices.*.jasa' => 'required|numeric|min:0',
            'invoices.*.discount' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            // Create ticket
            $ticket = Ticket::create([
                'user_id' => auth()->id(),
                'company_id' => $validated['company_id'],
                'planned_delivery_date' => $validated['planned_delivery_date'],
                'has_invoice' => $request->has('has_invoice'),
                'has_faktur_pajak' => $request->has('has_faktur_pajak'),
                'has_surat_jalan' => $request->has('has_surat_jalan'),
                'has_po' => $request->has('has_po'),
                'document_notes' => $validated['document_notes'],
                'status' => 'submitted',
            ]);

            // Create invoices
            foreach ($validated['invoices'] as $invoiceData) {
                $invoice = new Invoice($invoiceData);
                $invoice->calculateAmounts();
                $ticket->invoices()->save($invoice);
            }

            DB::commit();

            return redirect()->route('tickets.show', $ticket)
                ->with('success', 'Tiket berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat tiket: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function show(Ticket $ticket)
    {
        // Simple check: only owner or admin can view
        if (auth()->user()->role !== 'admin' && $ticket->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        
        $ticket->load(['company', 'invoices', 'user']);
        
        return view('tickets.show', compact('ticket'));
    }

    public function print(Ticket $ticket)
    {
        // Simple check: only owner or admin can print
        if (auth()->user()->role !== 'admin' && $ticket->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        
        $ticket->load(['company', 'invoices', 'user']);
        
        return view('tickets.print', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        // Simple check: only owner can edit
        if ($ticket->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        
        if ($ticket->status !== 'draft') {
            return back()->with('error', 'Hanya tiket draft yang bisa diedit.');
        }

        $companies = Company::where('is_active', true)->get();
        $ticket->load('invoices');
        
        return view('tickets.edit', compact('ticket', 'companies'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        // Simple check: only owner can update
        if ($ticket->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        if ($ticket->status !== 'draft') {
            return back()->with('error', 'Hanya tiket draft yang bisa diedit.');
        }

        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'planned_delivery_date' => 'required|date|after_or_equal:today',
            'has_invoice' => 'boolean',
            'has_faktur_pajak' => 'boolean',
            'has_surat_jalan' => 'boolean',
            'has_po' => 'boolean',
            'document_notes' => 'nullable|string',
            'invoices' => 'required|array|min:1',
            'invoices.*.no_seri_fp' => 'required|string',
            'invoices.*.invoice_number' => 'required|string',
            'invoices.*.invoice_date' => 'required|date',
            'invoices.*.currency' => 'required|string|max:3',
            'invoices.*.barang' => 'required|numeric|min:0',
            'invoices.*.jasa' => 'required|numeric|min:0',
            'invoices.*.discount' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();

            $ticket->update([
                'company_id' => $validated['company_id'],
                'planned_delivery_date' => $validated['planned_delivery_date'],
                'has_invoice' => $request->has('has_invoice'),
                'has_faktur_pajak' => $request->has('has_faktur_pajak'),
                'has_surat_jalan' => $request->has('has_surat_jalan'),
                'has_po' => $request->has('has_po'),
                'document_notes' => $validated['document_notes'],
            ]);

            // Delete old invoices and create new ones
            $ticket->invoices()->delete();

            foreach ($validated['invoices'] as $invoiceData) {
                $invoice = new Invoice($invoiceData);
                $invoice->calculateAmounts();
                $ticket->invoices()->save($invoice);
            }

            DB::commit();

            return redirect()->route('tickets.show', $ticket)
                ->with('success', 'Tiket berhasil diupdate!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal update tiket: ' . $e->getMessage())
                ->withInput();
        }
    }
}