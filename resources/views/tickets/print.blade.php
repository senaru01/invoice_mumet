<!DOCTYPE html>
<html>
<head>
    <title>Tiket #{{ $ticket->ticket_number }}</title>
    <style>
        @media print {
            @page { margin: 1cm; }
            body { margin: 0; }
            .no-print { display: none; }
        }
        
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            max-width: 900px;
            margin: 0 auto;
            color: #000;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        
        .ticket-number {
            font-size: 18px;
            margin: 10px 0;
            font-weight: bold;
        }
        
        .info-section {
            margin: 20px 0;
        }
        
        .info-row {
            display: flex;
            margin: 8px 0;
        }
        
        .info-label {
            width: 200px;
            font-weight: bold;
        }
        
        .info-value {
            flex: 1;
        }
        
        /* Checklist Styling */
        .checklist {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ddd;
            background: #f9f9f9;
        }
        
        .checklist h3 {
            margin: 0 0 15px 0;
            font-size: 16px;
            font-weight: bold;
        }
        
        .checklist-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        
        .checklist-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid #666;
            display: inline-block;
            position: relative;
            background: #fff;
        }
        
        .checkbox.checked::after {
            content: '✓';
            position: absolute;
            top: -2px;
            left: 2px;
            font-size: 16px;
            color: #5b21b6;
            font-weight: bold;
        }
        
        .cross {
            color: #dc2626;
            font-weight: bold;
            font-size: 18px;
        }
        
        .status-text {
            font-size: 14px;
        }
        
        .status-ada {
            color: #059669;
        }
        
        .status-tidak {
            color: #dc2626;
        }
        
        /* Table Styling */
        .invoice-section {
            margin: 30px 0;
        }
        
        .invoice-section h3 {
            margin: 0 0 15px 0;
            font-size: 16px;
            font-weight: bold;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        
        table th {
            background: #374151;
            color: white;
            padding: 12px 8px;
            text-align: left;
            font-size: 13px;
            font-weight: bold;
            border: 1px solid #374151;
        }
        
        table td {
            border: 1px solid #ddd;
            padding: 10px 8px;
            font-size: 13px;
        }
        
        table tbody tr:nth-child(even) {
            background: #f9fafb;
        }
        
        .text-center {
            text-align: center;
        }
        
        .total-row {
            background: #f3f4f6 !important;
            font-weight: bold;
        }
        
        /* QR Code Section */
        .qr-section {
            margin: 30px 0;
            padding: 20px;
            border: 2px dashed #666;
            text-align: center;
        }
        
        .qr-section h3 {
            margin: 0 0 20px 0;
            font-size: 18px;
            font-weight: bold;
        }
        
        .qr-code-box {
            display: inline-block;
            padding: 20px;
            background: white;
            border: 2px solid #000;
        }
        
        .qr-code-box svg {
            display: block;
            margin: 0 auto;
        }
        
        .ticket-number-display {
            font-size: 16px;
            font-weight: bold;
            margin-top: 15px;
            letter-spacing: 2px;
        }
        
        /* Footer */
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #ddd;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        
        .print-info {
            margin-top: 20px;
            font-size: 11px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="no-print" style="margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; background: #4F46E5; color: white; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;">
            🖨️ Print Tiket
        </button>
        <a href="{{ route('tickets.show', $ticket) }}" style="padding: 10px 20px; background: #6B7280; color: white; text-decoration: none; border-radius: 5px;">
            Kembali
        </a>
    </div>

    <div class="header">
        <h1>TIKET PENGIRIMAN INVOICE</h1>
        <div class="ticket-number">{{ $ticket->ticket_number }}</div>
        <div style="font-size: 14px; color: #666;">Tanggal: {{ $ticket->created_at->format('d/m/Y H:i') }}</div>
    </div>

    <div class="info-section">
        <div class="info-row">
            <div class="info-label">Company:</div>
            <div class="info-value">{{ $ticket->company->name }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Jenis Usaha:</div>
            <div class="info-value">{{ $ticket->company->description }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Dibuat oleh:</div>
            <div class="info-value">{{ $ticket->user->name }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Rencana Kirim:</div>
            <div class="info-value">{{ $ticket->planned_delivery_date->format('d/m/Y') }}</div>
        </div>
    </div>

    <!-- Checklist Kelengkapan Dokumen -->
    <div class="checklist">
        <h3>Checklist Kelengkapan Dokumen</h3>
        <div class="checklist-grid">
            <div class="checklist-item">
                <span class="checkbox {{ $ticket->has_invoice ? 'checked' : '' }}"></span>
                <span class="status-text">Invoice: 
                    @if($ticket->has_invoice)
                        <span class="status-ada">Ada</span>
                    @else
                        <span class="cross">✗</span> <span class="status-tidak">Tidak Ada</span>
                    @endif
                </span>
            </div>
            
            <div class="checklist-item">
                <span class="checkbox {{ $ticket->has_faktur_pajak ? 'checked' : '' }}"></span>
                <span class="status-text">Faktur Pajak: 
                    @if($ticket->has_faktur_pajak)
                        <span class="status-ada">Ada</span>
                    @else
                        <span class="cross">✗</span> <span class="status-tidak">Tidak Ada</span>
                    @endif
                </span>
            </div>
            
            <div class="checklist-item">
                <span class="checkbox {{ $ticket->has_surat_jalan ? 'checked' : '' }}"></span>
                <span class="status-text">Surat Jalan: 
                    @if($ticket->has_surat_jalan)
                        <span class="status-ada">Ada</span>
                    @else
                        <span class="cross">✗</span> <span class="status-tidak">Tidak Ada</span>
                    @endif
                </span>
            </div>
            
            <div class="checklist-item">
                <span class="checkbox {{ $ticket->has_po ? 'checked' : '' }}"></span>
                <span class="status-text">PO: 
                    @if($ticket->has_po)
                        <span class="status-ada">Ada</span>
                    @else
                        <span class="cross">✗</span> <span class="status-tidak">Tidak Ada</span>
                    @endif
                </span>
            </div>
        </div>
        
        @if($ticket->document_notes)
        <div style="margin-top: 15px; padding: 10px; background: #fff3cd; border-left: 4px solid #ffc107;">
            <strong>Keterangan:</strong> {{ $ticket->document_notes }}
        </div>
        @endif
    </div>

    <!-- Daftar Invoice -->
    <div class="invoice-section">
        <h3>Daftar Invoice</h3>
        <table>
            <thead>
                <tr>
                    <th class="text-center" style="width: 40px;">No</th>
                    <th>No Invoice</th>
                    <th>No Seri F/P</th>
                    <th>Tanggal Invoice</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ticket->invoices as $index => $invoice)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td><strong>{{ $invoice->invoice_number }}</strong></td>
                    <td>{{ $invoice->no_seri_fp }}</td>
                    <td>{{ $invoice->invoice_date->format('d/m/Y') }}</td>
                </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="4" style="text-align: center; padding: 12px;">
                        TOTAL: <strong>{{ $ticket->invoice_count }} Invoice</strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- QR Code Section -->
    <div class="qr-section">
        <h3>Scan QR Code untuk Penerimaan</h3>
        
        <div class="qr-code-box">
            @if(class_exists('SimpleSoftwareIO\QrCode\Facades\QrCode'))
                {!! QrCode::size(200)->generate($ticket->ticket_number) !!}
            @else
                <!-- Fallback jika library belum terinstall -->
                <div style="width: 200px; height: 200px; border: 2px solid #000; display: flex; align-items: center; justify-content: center; background: #f0f0f0;">
                    <div style="text-align: center;">
                        <div style="font-size: 48px; margin-bottom: 10px;">⬛</div>
                        <div style="font-size: 12px; color: #666;">QR Code<br>{{ $ticket->ticket_number }}</div>
                    </div>
                </div>
            @endif
        </div>
        
        <div class="ticket-number-display">{{ $ticket->ticket_number }}</div>
        
        <p style="margin-top: 15px; font-size: 13px; color: #666;">
            Scan QR Code di atas atau input nomor tiket secara manual di sistem penerimaan
        </p>
    </div>

    <div class="footer">
        <p><strong>PETUNJUK PENGGUNAAN:</strong></p>
        <ol style="text-align: left; max-width: 600px; margin: 10px auto; line-height: 1.8;">
            <li>Bawa tiket ini saat mengirim invoice ke PT STEP</li>
            <li>Scan QR Code atau masukkan nomor tiket di sistem penerimaan</li>
            <li>Serahkan invoice beserta dokumen pendukung sesuai checklist</li>
            <li>Tunggu bukti terima invoice dicetak</li>
            <li>Simpan bukti terima sebagai arsip</li>
        </ol>
        
        <div class="print-info">
            Dicetak pada: {{ now()->format('d/m/Y H:i:s') }} | Dokumen ini sah tanpa tanda tangan
        </div>
    </div>
</body>
</html>