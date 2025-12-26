<?php

namespace App\Http\Controllers;
use App\Exports\TicketsExport;
use App\Models\Ticket;
use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Summary statistics
        $stats = [
            'total_suppliers' => Company::where('is_active', true)->count(),
            'total_tickets' => Ticket::count(),
            'submitted_tickets' => Ticket::where('status', 'submitted')->count(),
            'received_tickets' => Ticket::where('status', 'received')->count(),
            'total_invoices' => Invoice::count(),
            'total_amount' => Invoice::sum('grand_total'),
        ];

        // Recent tickets with filters
        $query = Ticket::with(['company', 'user', 'invoices']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $tickets = $query->latest()->paginate(15);

        // Companies for filter
        $companies = Company::where('is_active', true)->get();

        // Daily statistics (last 7 days)
        $dailyStats = Ticket::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as count'),
                DB::raw('SUM(CASE WHEN status = "received" THEN 1 ELSE 0 END) as received')
            )
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();

        return view('admin.dashboard', compact('stats', 'tickets', 'companies', 'dailyStats'));
    }

    public function show(Ticket $ticket)
    {
        $ticket->load(['company', 'user', 'invoices']);
        return view('admin.tickets.show', compact('ticket'));
    }
    public function export(Request $request)
    {
        return Excel::download(
            new TicketsExport($request->only([
                'status',
                'company_id',
                'date_from',
                'date_to'
            ])),
            'tickets-' . now()->format('Y-m-d_H-i') . '.xlsx'
        );
    }
}