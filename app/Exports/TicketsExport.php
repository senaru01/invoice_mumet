<?php

namespace App\Exports;

use App\Models\Ticket;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{
    FromCollection,
    WithHeadings,
    WithMapping,
    WithColumnFormatting,
    ShouldAutoSize
};
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TicketsExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize
{
    protected $filters;
    protected $rows;

    public function __construct(array $filters)
    {
        $this->filters = $filters;

        $this->rows = Ticket::with(['company', 'user', 'invoices'])
            ->when($filters['status'] ?? null, fn($q, $v) => $q->where('status', $v))
            ->when($filters['company_id'] ?? null, fn($q, $v) => $q->where('company_id', $v))
            ->when($filters['date_from'] ?? null, fn($q, $v) => $q->whereDate('created_at', '>=', $v))
            ->when($filters['date_to'] ?? null, fn($q, $v) => $q->whereDate('created_at', '<=', $v))
            ->latest()
            ->get()
            ->flatMap(function ($ticket) {
                return $ticket->invoices->map(function ($invoice) use ($ticket) {
                    return [
                        'ticket' => $ticket,
                        'invoice' => $invoice,
                    ];
                });
            });
    }

    public function collection(): Collection
    {
        return $this->rows;
    }

    public function headings(): array
    {
        return [
            'No Tiket',
            'Company',
            'User',
            'Status',
            'Tanggal Ticket',
            'Barang',
            'Jasa',
            'Discount',
            'Subtotal',
            'PPN 11%',
            'PPh 23',
            'Grand Total',
        ];
    }

    public function map($row): array
    {
        $ticket  = $row['ticket'];
        $invoice = $row['invoice'];

        return [
            $ticket->ticket_number,
            $ticket->company->name,
            $ticket->user->name ?? '-',
            ucfirst($ticket->status),
            $ticket->created_at->format('d-m-Y'),

            $invoice->barang,
            $invoice->jasa,
            $invoice->discount,
            $invoice->subtotal1,
            $invoice->tax,
            $invoice->pph23,
            $invoice->grand_total,
        ];
    }

    public function columnFormats(): array
        {
            return [
                // Barang
                'F' => '_([$Rp-id-ID]* #,##0_);_([$Rp-id-ID]* (#,##0);_([$Rp-id-ID]* "-"_);_(@_)',
                // Jasa
                'G' => '_([$Rp-id-ID]* #,##0_);_([$Rp-id-ID]* (#,##0);_([$Rp-id-ID]* "-"_);_(@_)',
                // Discount
                'H' => '_([$Rp-id-ID]* #,##0_);_([$Rp-id-ID]* (#,##0);_([$Rp-id-ID]* "-"_);_(@_)',
                // Subtotal
                'I' => '_([$Rp-id-ID]* #,##0_);_([$Rp-id-ID]* (#,##0);_([$Rp-id-ID]* "-"_);_(@_)',
                // PPN 11%
                'J' => '_([$Rp-id-ID]* #,##0_);_([$Rp-id-ID]* (#,##0);_([$Rp-id-ID]* "-"_);_(@_)',
                // PPh 23
                'K' => '_([$Rp-id-ID]* #,##0_);_([$Rp-id-ID]* (#,##0);_([$Rp-id-ID]* "-"_);_(@_)',
                // Grand Total
                'L' => '_([$Rp-id-ID]* #,##0_);_([$Rp-id-ID]* (#,##0);_([$Rp-id-ID]* "-"_);_(@_)',
            ];
        }
}
