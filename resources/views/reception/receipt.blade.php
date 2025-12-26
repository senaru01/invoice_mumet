<!DOCTYPE html>
<html>
<head>
    <title>Bukti Terima - {{ $ticket->ticket_number }}</title>
    <meta charset="utf-8">
    <style>
        @page {
            size: 80mm auto;
            margin: 0;
        }
        
        @media print {
            body { margin: 0; padding: 0; }
            .no-print { display: none; }
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Courier New', monospace;
            width: 80mm;
            margin: 0 auto;
            padding: 5mm;
            font-size: 13px; /* 11px → 13px */
            line-height: 1.5; /* 1.4 → 1.5 */
            color: #000;
            background: #fff;
            font-weight: 600; /* TAMBAH BOLD DEFAULT */
        }
        
        .center {
            text-align: center;
        }
        
        .bold {
            font-weight: 900; /* EXTRA BOLD */
        }
        
        .large {
            font-size: 16px; /* 14px → 16px */
        }
        
        .header {
            text-align: center;
            margin-bottom: 12px; /* 10px → 12px */
            padding-bottom: 12px; /* 10px → 12px */
            border-bottom: 3px dashed #000; /* 2px → 3px */
        }
        
        .header h1 {
            font-size: 18px; /* 16px → 18px */
            font-weight: 900; /* EXTRA BOLD */
            margin-bottom: 5px; /* 3px → 5px */
        }
        
        .header .company-name {
            font-size: 25px; /* 13px → 15px */
            font-weight: 900; /* EXTRA BOLD */
            margin-bottom: 3px;
        }
        
        .status-badge {
            display: inline-block;
            border: 3px solid #000; /* 2px → 3px */
            padding: 5px 12px; /* 3px 10px → 5px 12px */
            margin: 5px 0;
            font-weight: 900; /* EXTRA BOLD */
            font-size: 14px; /* 12px → 14px */
        }
        
        .divider {
            border-top: 2px dashed #000; /* 1px → 2px */
            margin: 10px 0; /* 8px → 10px */
        }
        
        .divider-double {
            border-top: 3px solid #000; /* 2px → 3px */
            margin: 12px 0; /* 10px → 12px */
        }
        
        .info-row {
            margin: 6px 0; /* 5px → 6px */
            display: flex;
            justify-content: space-between;
            font-size: 13px; /* TAMBAH SIZE */
        }
        
        .info-label {
            font-weight: 900; /* EXTRA BOLD */
            width: 40%;
        }
        
        .info-value {
            width: 60%;
            text-align: right;
            font-weight: 700; /* BOLD */
        }
        
        .section-title {
            font-weight: 900; /* EXTRA BOLD */
            font-size: 14px; /* 12px → 14px */
            margin: 12px 0 6px 0; /* 10px → 12px, 5px → 6px */
            text-align: center;
            border-top: 2px dashed #000; /* 1px → 2px */
            border-bottom: 2px dashed #000; /* 1px → 2px */
            padding: 5px 0; /* 3px → 5px */
        }
        
        .invoice-item {
            margin: 10px 0; /* 8px → 10px */
            padding: 6px 0; /* 5px → 6px */
            border-bottom: 2px dotted #666; /* 1px → 2px, lebih gelap */
        }
        
        .invoice-item:last-child {
            border-bottom: none;
        }
        
        .invoice-number {
            font-weight: 900; /* EXTRA BOLD */
            font-size: 14px; /* 12px → 14px */
        }
        
        .invoice-detail {
            font-size: 12px; /* 10px → 12px */
            margin-top: 3px;
            color: #000; /* #333 → #000 lebih gelap */
            font-weight: 700; /* BOLD */
        }
        
        .total-box {
            background: #000;
            color: #000000ff;
            padding: 10px; /* 8px → 10px */
            text-align: center;
            font-weight: 900; /* EXTRA BOLD */
            font-size: 15px; /* 13px → 15px */
            margin: 12px 0; /* 10px → 12px */
        }
        
        .signature {
            margin-top: 18px; /* 15px → 18px */
            text-align: center;
        }
        
        .signature-line {
            margin: 35px auto 6px auto; /* 30px → 35px, 5px → 6px */
            width: 60%;
            border-top: 2px solid #000; /* 1px → 2px */
        }
        
        .footer {
            text-align: center;
            font-size: 11px; /* 9px → 11px */
            margin-top: 18px; /* 15px → 18px */
            padding-top: 12px; /* 10px → 12px */
            border-top: 3px dashed #000; /* 2px → 3px */
            font-weight: 700; /* BOLD */
        }
        
        .barcode-text {
            font-family: 'Courier New', monospace;
            font-size: 12px; /* 10px → 12px */
            letter-spacing: 2px; /* 1px → 2px */
            text-align: center;
            margin: 6px 0; /* 5px → 6px */
            font-weight: 900; /* EXTRA BOLD */
        }
        
        .important-note {
            background: #e0e0e0; /* #f0f0f0 → lebih gelap */
            padding: 10px; /* 8px → 10px */
            margin: 12px 0; /* 10px → 12px */
            border: 2px solid #666; /* 1px → 2px, #999 → #666 */
            font-size: 12px; /* 10px → 12px */
            line-height: 1.6; /* 1.5 → 1.6 */
            font-weight: 700; /* BOLD */
        }

        /* Redirect overlay */
        .redirect-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .redirect-message {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            max-width: 400px;
        }

        @media print {
            .redirect-overlay { display: none; }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="company-name">PT. STEP</div>
        <h1>BUKTI TERIMA INVOICE</h1>
        <div style="font-size: 12px; margin-top: 3px; font-weight: 700;">Dokumen Resmi Penerimaan</div>
        <div class="status-badge">*** DITERIMA ***</div>
    </div>

    <!-- Receipt Info -->
    <div class="center bold" style="margin: 12px 0; font-size: 14px;">
        No: {{ $ticket->ticket_number }}
    </div>

    <div class="divider"></div>

    <!-- Tanggal & Waktu -->
    <div class="info-row">
        <span class="info-label">Tanggal:</span>
        <span class="info-value">{{ $ticket->received_at->format('d/m/Y') }}</span>
    </div>
    <div class="info-row">
        <span class="info-label">Jam:</span>
        <span class="info-value">{{ $ticket->received_at->format('H:i:s') }}</span>
    </div>

    <div class="divider"></div>

    <!-- Company Info -->
    <div class="info-row">
        <span class="info-label">Company:</span>
        <span class="info-value">{{ $ticket->company->name }}</span>
    </div>
    

    <div class="divider"></div>


    <div class="divider-double"></div>

    <!-- Invoice List -->
    <div class="section-title">DAFTAR INVOICE</div>

    @foreach($ticket->invoices as $index => $invoice)
    <div class="invoice-item">
        <div class="invoice-number">{{ $index + 1 }}. {{ $invoice->invoice_number }}</div>
        <div class="invoice-detail">
            F/P: {{ $invoice->no_seri_fp }}<br>
            Tgl: {{ $invoice->invoice_date->format('d/m/Y') }} | {{ $invoice->currency }}
        </div>
    </div>
    @endforeach

    <div class="divider-double"></div>

    <!-- Total -->
    <div class="total-box">
        TOTAL: {{ $ticket->invoice_count }} INVOICE
    </div>

    <!-- Important Note -->
    <div class="important-note">
        <div class="bold" style="margin-bottom: 4px; font-size: 13px;">CATATAN:</div>
        - Pastikan kelengkapan dokumen sesuai checklist<br>
        - Jika dokumen tidak lengkap berpotensi terjadi penundaan pembayaran<br>
        - Segala hal yang timbul akibat tidak lengkapnya dokumen, menjadi tanggungjawab masing-masing Supplier
    </div>

    

    <!-- Footer -->
    <div class="footer">
        <div class="bold" style="font-size: 13px;">TERIMA KASIH</div>
        <div style="margin-top: 6px;">
            Dicetak : {{ now()->format('d/m/Y H:i:s') }}<br>
            Dokumen ini sah tanpa tanda tangan basah
            Develop by KOPAS
        </div>
    </div>

    <!-- Extra space for cutting -->
    <div style="height: 20mm;"></div>

    <!-- Redirect Overlay (muncul setelah print) -->
    <div class="redirect-overlay no-print" id="redirectOverlay" style="display: none;">
        <div class="redirect-message">
            <svg class="w-16 h-16 text-green-600 mx-auto mb-4" style="width: 64px; height: 64px; color: #16a34a; margin: 0 auto 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 16px;">Print Selesai!</h2>
            <p style="color: #666; margin-bottom: 20px;">Anda akan dialihkan ke menu reception...</p>
            <div style="width: 100%; height: 4px; background: #e5e7eb; border-radius: 2px; overflow: hidden;">
                <div id="progressBar" style="width: 0%; height: 100%; background: #16a34a; transition: width 0.1s;"></div>
            </div>
        </div>
    </div>

    <script>
        let printExecuted = false;
        let redirectTimer = null;

        // Function untuk redirect ke reception
        function redirectToReception() {
            window.location.href = "{{ route('reception.index') }}";
        }

        // Detect print dialog close
        window.onbeforeprint = function() {
            printExecuted = true;
        };

        window.onafterprint = function() {
            if (printExecuted) {
                // Show overlay
                document.getElementById('redirectOverlay').style.display = 'flex';
                
                // Progress bar animation
                let progress = 0;
                const progressBar = document.getElementById('progressBar');
                const interval = setInterval(function() {
                    progress += 2;
                    progressBar.style.width = progress + '%';
                    if (progress >= 100) {
                        clearInterval(interval);
                    }
                }, 60); // 3 detik total (100/2 * 60ms)
                
                // Redirect setelah 3 detik
                redirectTimer = setTimeout(redirectToReception, 3000);
            }
        };

        // Auto print when page loads
        window.onload = function() {
            setTimeout(function() {
                window.print();
                
                // Fallback: jika browser tidak support onafterprint
                // Redirect setelah 5 detik
                setTimeout(function() {
                    if (!document.getElementById('redirectOverlay').style.display || 
                        document.getElementById('redirectOverlay').style.display === 'none') {
                        redirectToReception();
                    }
                }, 5000);
            }, 300);
        };

        // Handle jika user close tab sebelum print
        window.onbeforeunload = function() {
            if (redirectTimer) {
                clearTimeout(redirectTimer);
            }
        };
    </script>
</body>
</html>