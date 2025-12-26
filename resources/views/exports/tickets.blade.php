<table>
    <thead>
        <tr>
            <th>No Tiket</th>
            <th>Company</th>
            <th>User</th>
            <th>Status</th>
            <th>Tanggal Ticket</th>

            <th>No Invoice</th>
            <th>No Seri FP</th>
            <th>Tanggal Invoice</th>
            <th>Currency</th>

            <th>Barang</th>
            <th>Jasa</th>
            <th>Discount</th>
            <th>Subtotal</th>
            <th>PPN 11%</th>
            <th>PPh 23</th>
            <th>Grand Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tickets as $ticket)
            @foreach($ticket->invoices as $invoice)
                <tr>
                    <td>{{ $ticket->ticket_number }}</td>
                    <td>{{ $ticket->company->name }}</td>
                    <td>{{ $ticket->user->name ?? '-' }}</td>
                    <td>{{ ucfirst($ticket->status) }}</td>
                    <td>{{ $ticket->created_at->format('d-m-Y') }}</td>

                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->no_seri_fp }}</td>
                    <td>{{ $invoice->invoice_date->format('d-m-Y') }}</td>
                    <td>{{ $invoice->currency }}</td>

                    <td>{{ $invoice->barang }}</td>
                    <td>{{ $invoice->jasa }}</td>
                    <td>{{ $invoice->discount }}</td>
                    <td>{{ $invoice->subtotal1 }}</td>
                    <td>{{ $invoice->tax }}</td>
                    <td>{{ $invoice->pph23 }}</td>
                    <td>{{ $invoice->grand_total }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
