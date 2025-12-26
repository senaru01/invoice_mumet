<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceptionController extends Controller
{
    public function index()
    {
        // Statistics untuk dashboard
        $stats = [
            'today_tickets' => Ticket::whereDate('created_at', today())->count(),
            'today_received' => Ticket::whereDate('received_at', today())->count(),
            'today_pending' => Ticket::whereDate('created_at', today())
                ->where('status', 'submitted')
                ->count(),
        ];

        return view('reception.index', compact('stats'));
    }

    public function scan(Request $request)
    {
        $request->validate([
            'ticket_number' => 'required|string',
        ]);

        $ticket = Ticket::where('ticket_number', $request->ticket_number)
            ->with(['company', 'invoices', 'user'])
            ->first();

        if (!$ticket) {
            return back()->with('error', 'Tiket tidak ditemukan! Periksa kembali nomor tiket.');
        }

        // CEK: Jika tiket sudah diterima (status = received)
        if ($ticket->status === 'received') {
            // Redirect ke halaman already-received (untuk reprint)
            return redirect()->route('reception.already-received', $ticket);
        }

        // Jika status submitted (belum diterima), lanjut ke confirm
        if ($ticket->status === 'submitted') {
            return redirect()->route('reception.confirm', $ticket);
        }

        // Jika status draft atau lainnya
        return back()->with('error', 'Tiket ini belum di-submit oleh supplier!');
    }

    public function confirm(Ticket $ticket)
    {
        // Pastikan status masih submitted
        if ($ticket->status !== 'submitted') {
            return redirect()->route('reception.index')
                ->with('error', 'Tiket ini tidak dapat diproses!');
        }

        $ticket->load(['company', 'invoices', 'user']);
        
        return view('reception.confirm', compact('ticket'));
    }

    public function receive(Request $request, Ticket $ticket)
    {
        // Validasi
        $request->validate([
            'received_by' => 'required|string|max:255',
        ]);

        // Pastikan status masih submitted
        if ($ticket->status !== 'submitted') {
            return redirect()->route('reception.index')
                ->with('error', 'Tiket ini sudah diproses sebelumnya!');
        }

        try {
            DB::beginTransaction();

            // Update ticket status
            $ticket->update([
                'status' => 'received',
                'received_at' => now(),
                'received_by' => $request->received_by,
            ]);

            DB::commit();

            // Redirect ke receipt page
            return redirect()->route('reception.receipt', $ticket)
                ->with('success', 'Invoice berhasil diterima!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menerima invoice: ' . $e->getMessage());
        }
    }

    public function receipt(Ticket $ticket)
    {
        // Pastikan status received
        if ($ticket->status !== 'received') {
            return redirect()->route('reception.index')
                ->with('error', 'Tiket ini belum diterima!');
        }

        $ticket->load(['company', 'invoices', 'user']);
        
        return view('reception.receipt', compact('ticket'));
    }

    public function printReceipt(Ticket $ticket)
    {
        // Pastikan status received
        if ($ticket->status !== 'received') {
            return redirect()->route('reception.index')
                ->with('error', 'Tiket ini belum diterima!');
        }

        $ticket->load(['company', 'invoices', 'user']);
        
        return view('reception.print-receipt', compact('ticket'));
    }

    // NEW METHOD: Handle tiket yang sudah diterima (untuk reprint)
    public function alreadyReceived(Ticket $ticket)
    {
        // Pastikan status memang received
        if ($ticket->status !== 'received') {
            return redirect()->route('reception.index')
                ->with('error', 'Tiket ini belum diterima!');
        }

        $ticket->load(['company', 'invoices', 'user']);
        
        return view('reception.already-received', compact('ticket'));
    }
}