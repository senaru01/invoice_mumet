<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Buat Tiket Baru') }}
        </h2>
    </x-slot>

    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-slate-800 rounded-lg shadow-xl p-6 border border-slate-600">
            <form action="{{ route('tickets.store') }}" method="POST" id="ticketForm">
                @csrf

                <!-- Hidden Company ID -->
                <input type="hidden" name="company_id" value="{{ auth()->user()->company_id }}">
                
                <!-- Company Info & Delivery Date -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Company (Supplier)</label>
                        <input type="text" readonly value="{{ auth()->user()->company->name ?? '-' }}" 
                               class="w-full border-slate-500 bg-slate-700 text-gray-100 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Description (Jenis Usaha)</label>
                        <input type="text" readonly value="{{ auth()->user()->company->description ?? '-' }}" 
                               class="w-full border-slate-500 bg-slate-700 text-gray-100 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Rencana Kirim Invoice <span class="text-red-400">*</span></label>
                        <input type="date" name="planned_delivery_date" id="planned_delivery_date" required 
                               value="{{ old('planned_delivery_date') }}" min="{{ date('Y-m-d') }}" 
                               class="w-full border-slate-500 bg-slate-700 text-gray-100 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500">
                        @error('planned_delivery_date')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Data Invoice Section -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-gray-100">Data Invoice</h3>
                        <button type="button" onclick="addInvoice()" 
                                class="px-6 py-2.5 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 font-semibold shadow-md hover:shadow-lg transition">
                            + Tambah Invoice
                        </button>
                    </div>

                    <!-- Table wrapper dengan scroll -->
                    <div class="overflow-x-auto shadow-lg rounded-lg border-2 border-emerald-600">
                        <div style="min-width: 2400px;">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-emerald-700 text-white">
                                        <th rowspan="2" class="border border-emerald-600 px-4 py-3 text-xs font-bold" style="width: 50px;">No</th>
                                        <th rowspan="2" class="border border-emerald-600 px-4 py-3 text-xs font-bold" style="width: 180px;">Company</th>
                                        <th rowspan="2" class="border border-emerald-600 px-4 py-3 text-xs font-bold" style="width: 180px;">Description</th>
                                        <th rowspan="2" class="border border-emerald-600 px-4 py-3 text-xs font-bold" style="width: 180px;">No seri F/P</th>
                                        <th rowspan="2" class="border border-emerald-600 px-4 py-3 text-xs font-bold" style="width: 180px;">no. Invoice</th>
                                        <th rowspan="2" class="border border-emerald-600 px-4 py-3 text-xs font-bold" style="width: 150px;">Invoice Date</th>
                                        <th rowspan="2" class="border border-emerald-600 px-4 py-3 text-xs font-bold" style="width: 100px;">Currency</th>
                                        <th colspan="6" class="border border-emerald-600 px-4 py-2 text-xs font-bold">Amount</th>
                                        <th rowspan="2" class="border border-emerald-600 px-4 py-3 text-xs font-bold" style="width: 150px;">PPH PASAL 23</th>
                                        <th rowspan="2" class="border border-emerald-600 px-4 py-3 text-xs font-bold" style="width: 180px;">Grand Total</th>
                                        <th rowspan="2" class="border border-emerald-600 px-4 py-3 text-xs font-bold" style="width: 150px;">date kirim invoice</th>
                                        <th rowspan="2" class="border border-emerald-600 px-4 py-3 text-xs font-bold" style="width: 100px;">Aksi</th>
                                    </tr>
                                    <tr class="bg-emerald-700 text-white">
                                        <th class="border border-emerald-600 px-4 py-2 text-xs font-bold" style="width: 150px;">barang</th>
                                        <th class="border border-emerald-600 px-4 py-2 text-xs font-bold" style="width: 150px;">Jasa</th>
                                        <th class="border border-emerald-600 px-4 py-2 text-xs font-bold" style="width: 150px;">Discount</th>
                                        <th class="border border-emerald-600 px-4 py-2 text-xs font-bold" style="width: 150px;">Sub Total (1)</th>
                                        <th class="border border-emerald-600 px-4 py-2 text-xs font-bold" style="width: 150px;">TAX (11.00%)</th>
                                        <th class="border border-emerald-600 px-4 py-2 text-xs font-bold" style="width: 150px;">Sub Total (2)</th>
                                    </tr>
                                </thead>
                                <tbody id="invoicesTableBody" class="bg-slate-700">
                                    <!-- Invoices akan ditambahkan di sini -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2 italic">* Scroll ke kanan untuk melihat semua kolom</p>
                </div>

                <!-- Checklist Kelengkapan Dokumen (PINDAH KE BAWAH) -->
                <div class="mb-6 p-4 bg-slate-700 rounded-lg border border-slate-600">
                    <h3 class="text-lg font-semibold text-gray-100 mb-4">Checklist Kelengkapan Dokumen</h3>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="has_invoice" value="1" {{ old('has_invoice') ? 'checked' : '' }} 
                                   class="rounded border-gray-400 text-emerald-600 focus:ring-emerald-500 bg-slate-600">
                            <span class="text-sm text-gray-300">Invoice</span>
                        </label>

                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="has_faktur_pajak" value="1" {{ old('has_faktur_pajak') ? 'checked' : '' }} 
                                   class="rounded border-gray-400 text-emerald-600 focus:ring-emerald-500 bg-slate-600">
                            <span class="text-sm text-gray-300">Faktur Pajak</span>
                        </label>

                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="has_surat_jalan" value="1" {{ old('has_surat_jalan') ? 'checked' : '' }} 
                                   class="rounded border-gray-400 text-emerald-600 focus:ring-emerald-500 bg-slate-600">
                            <span class="text-sm text-gray-300">Surat Jalan</span>
                        </label>

                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="has_po" value="1" {{ old('has_po') ? 'checked' : '' }} 
                                   class="rounded border-gray-400 text-emerald-600 focus:ring-emerald-500 bg-slate-600">
                            <span class="text-sm text-gray-300">PO</span>
                        </label>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Keterangan (Jika ada dokumen yang tidak lengkap)</label>
                        <textarea name="document_notes" rows="2" placeholder="Contoh: PO belum official" 
                                  class="w-full border-slate-500 bg-slate-600 text-gray-100 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 placeholder-gray-400">{{ old('document_notes') }}</textarea>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-4 border-t border-slate-600">
                    <a href="{{ route('tickets.index') }}" 
                       class="px-6 py-2.5 border-2 border-slate-500 rounded-lg text-gray-300 hover:bg-slate-700 font-semibold transition">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-2.5 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 font-semibold shadow-md hover:shadow-lg transition">
                        Simpan & Submit Tiket
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
    let invoiceCount = 0;
    const companyName = "{{ auth()->user()->company->name ?? '-' }}";
    const companyDescription = "{{ auth()->user()->company->description ?? '-' }}";

    document.addEventListener('DOMContentLoaded', function() {
        addInvoice();
    });

    function addInvoice() {
        invoiceCount++;
        const tbody = document.getElementById('invoicesTableBody');
        
        const row = document.createElement('tr');
        row.setAttribute('data-invoice', invoiceCount);
        row.className = 'hover:bg-slate-600 transition';
        
        row.innerHTML = `
            <td class="border border-slate-600 px-3 py-2 text-center text-sm font-semibold text-gray-200" style="width: 50px;">${invoiceCount}</td>
            <td class="border border-slate-600 px-3 py-2 text-sm text-gray-200" style="width: 180px;">
                <span class="company-name block">${companyName}</span>
            </td>
            <td class="border border-slate-600 px-3 py-2 text-sm text-gray-200" style="width: 180px;">
                <span class="company-desc block">${companyDescription}</span>
            </td>
            <td class="border border-slate-600 px-2 py-2" style="width: 180px;">
                <input type="text" name="invoices[${invoiceCount}][no_seri_fp]" required 
                    class="w-full border-slate-500 bg-slate-600 text-gray-100 focus:ring-emerald-500 focus:border-emerald-500 rounded text-sm px-3 py-1.5" 
                    placeholder="No Seri F/P" style="min-width: 160px;">
            </td>
            <td class="border border-slate-600 px-2 py-2" style="width: 180px;">
                <input type="text" name="invoices[${invoiceCount}][invoice_number]" required 
                    class="w-full border-slate-500 bg-slate-600 text-gray-100 focus:ring-emerald-500 focus:border-emerald-500 rounded text-sm px-3 py-1.5" 
                    placeholder="No Invoice" style="min-width: 160px;">
            </td>
            <td class="border border-slate-600 px-2 py-2" style="width: 150px;">
                <input type="date" name="invoices[${invoiceCount}][invoice_date]" required 
                    class="w-full border-slate-500 bg-slate-600 text-gray-100 focus:ring-emerald-500 focus:border-emerald-500 rounded text-sm px-2 py-1.5" 
                    style="min-width: 130px;">
            </td>
            <td class="border border-slate-600 px-2 py-2" style="width: 100px;">
                <select name="invoices[${invoiceCount}][currency]" required 
                    class="w-full border-slate-500 bg-slate-600 text-gray-100 focus:ring-emerald-500 focus:border-emerald-500 rounded text-sm px-2 py-1.5">
                    <option value="IDR">IDR</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                </select>
            </td>
            <td class="border border-slate-600 px-2 py-2" style="width: 150px;">
                <input type="number" name="invoices[${invoiceCount}][barang]" step="0.01" value="0" required 
                    class="invoice-amount w-full border-slate-500 bg-slate-600 text-gray-100 focus:ring-emerald-500 focus:border-emerald-500 rounded text-sm px-3 py-1.5 text-right font-mono" 
                    data-invoice="${invoiceCount}" placeholder="0.00" style="min-width: 130px;">
            </td>
            <td class="border border-slate-600 px-2 py-2" style="width: 150px;">
                <input type="number" name="invoices[${invoiceCount}][jasa]" step="0.01" value="0" required 
                    class="invoice-amount w-full border-slate-500 bg-slate-600 text-gray-100 focus:ring-emerald-500 focus:border-emerald-500 rounded text-sm px-3 py-1.5 text-right font-mono" 
                    data-invoice="${invoiceCount}" placeholder="0.00" style="min-width: 130px;">
            </td>
            <td class="border border-slate-600 px-2 py-2" style="width: 150px;">
                <input type="number" name="invoices[${invoiceCount}][discount]" step="0.01" value="0" required 
                    class="invoice-amount w-full border-slate-500 bg-slate-600 text-gray-100 focus:ring-emerald-500 focus:border-emerald-500 rounded text-sm px-3 py-1.5 text-right font-mono" 
                    data-invoice="${invoiceCount}" placeholder="0.00" style="min-width: 130px;">
            </td>
            <td class="border border-slate-600 px-3 py-2 bg-slate-600" style="width: 150px;">
                <span id="subtotal1_${invoiceCount}" class="text-sm text-right block font-semibold font-mono text-gray-200">0.00</span>
            </td>
            <td class="border border-slate-600 px-3 py-2 bg-slate-600" style="width: 150px;">
                <span id="tax_${invoiceCount}" class="text-sm text-right block font-semibold font-mono text-gray-200">0.00</span>
            </td>
            <td class="border border-slate-600 px-3 py-2 bg-slate-600" style="width: 150px;">
                <span id="subtotal2_${invoiceCount}" class="text-sm text-right block font-semibold font-mono text-gray-200">0.00</span>
            </td>
            <td class="border border-slate-600 px-3 py-2 bg-amber-900" style="width: 150px;">
                <span id="pph23_${invoiceCount}" class="text-sm text-right block font-semibold font-mono text-amber-200">0.00</span>
            </td>
            <td class="border border-slate-600 px-3 py-2 bg-emerald-900" style="width: 180px;">
                <span id="grandtotal_${invoiceCount}" class="text-sm text-right block font-bold text-emerald-200 font-mono">0.00</span>
            </td>
            <td class="border border-slate-600 px-3 py-2 text-sm text-center text-gray-200" style="width: 150px;">
                <span class="delivery-date block">-</span>
            </td>
            <td class="border border-slate-600 px-2 py-2 text-center" style="width: 100px;">
                <button type="button" onclick="removeInvoice(${invoiceCount})" 
                    class="text-red-400 hover:text-white hover:bg-red-600 text-xs font-semibold px-3 py-1.5 border border-red-500 rounded transition whitespace-nowrap">
                    Hapus
                </button>
            </td>
        `;
        
        tbody.appendChild(row);
        attachCalculationListeners(invoiceCount);
        updateDeliveryDates();
    }

    function removeInvoice(id) {
        const rows = document.querySelectorAll('#invoicesTableBody tr');
        if (rows.length <= 1) {
            alert('Minimal harus ada 1 invoice!');
            return;
        }
        
        const row = document.querySelector(`tr[data-invoice="${id}"]`);
        if (row) {
            row.remove();
            renumberInvoices();
        }
    }

    function renumberInvoices() {
        const rows = document.querySelectorAll('#invoicesTableBody tr');
        rows.forEach((row, index) => {
            row.querySelector('td:first-child').textContent = index + 1;
        });
    }

    function attachCalculationListeners(invoiceId) {
        const inputs = document.querySelectorAll(`[data-invoice="${invoiceId}"]`);
        inputs.forEach(input => {
            input.addEventListener('input', () => calculateInvoice(invoiceId));
        });
    }

    function calculateInvoice(invoiceId) {
        const barang = parseFloat(document.querySelector(`input[name="invoices[${invoiceId}][barang]"]`).value) || 0;
        const jasa = parseFloat(document.querySelector(`input[name="invoices[${invoiceId}][jasa]"]`).value) || 0;
        const discount = parseFloat(document.querySelector(`input[name="invoices[${invoiceId}][discount]"]`).value) || 0;
        
        const subtotal1 = barang + jasa - discount;
        const tax = subtotal1 * 0.11;
        const subtotal2 = subtotal1 + tax;
        const pph23 = jasa > 0 ? jasa * 0.02 : 0;
        const grandTotal = subtotal2 - pph23;
        
        document.getElementById(`subtotal1_${invoiceId}`).textContent = formatNumber(subtotal1);
        document.getElementById(`tax_${invoiceId}`).textContent = formatNumber(tax);
        document.getElementById(`subtotal2_${invoiceId}`).textContent = formatNumber(subtotal2);
        document.getElementById(`pph23_${invoiceId}`).textContent = formatNumber(pph23);
        document.getElementById(`grandtotal_${invoiceId}`).textContent = formatNumber(grandTotal);
    }

    function formatNumber(num) {
        return new Intl.NumberFormat('id-ID', { 
            minimumFractionDigits: 2,
            maximumFractionDigits: 2 
        }).format(num);
    }

    document.getElementById('planned_delivery_date').addEventListener('change', updateDeliveryDates);

    function updateDeliveryDates() {
        const deliveryDate = document.getElementById('planned_delivery_date').value;
        if (deliveryDate) {
            const date = new Date(deliveryDate);
            const formatted = date.toLocaleDateString('id-ID', { 
                day: '2-digit', 
                month: '2-digit', 
                year: 'numeric' 
            });
            const dateSpans = document.querySelectorAll('.delivery-date');
            dateSpans.forEach(span => {
                span.textContent = formatted;
            });
        }
    }
    </script>
    @endpush
</x-app-layout>