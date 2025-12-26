<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buat Tiket Invoice Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if($purchaseOrders->count() == 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <p class="text-gray-600">Belum ada PO yang tersedia untuk di-invoice.</p>
                        <p class="text-sm text-gray-500 mt-2">Silakan hubungi admin untuk membuat PO.</p>
                    </div>
                </div>
            @else
                <form action="{{ route('tickets.preview') }}" method="POST" id="invoiceForm">
                    @csrf

                    <!-- Ticket Information -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6">
                            <h3 class="font-semibold text-lg mb-4">Informasi Tiket</h3>
                            
                            <div class="grid md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Kirim *</label>
                                    <input type="date" name="delivery_date" required 
                                           class="w-full border-gray-300 rounded-lg shadow-sm"
                                           value="{{ old('delivery_date', date('Y-m-d')) }}">
                                </div>
                            </div>

                            <!-- Document Checkboxes -->
                            <div class="border-t pt-4">
                                <p class="text-sm font-medium text-gray-700 mb-3">Kelengkapan Dokumen:</p>
                                <div class="grid md:grid-cols-2 gap-3">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="has_po" value="1" checked class="rounded border-gray-300 text-blue-600">
                                        <span class="ml-2 text-sm text-gray-700">PO (Purchase Order)</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="has_invoice_doc" value="1" checked class="rounded border-gray-300 text-blue-600">
                                        <span class="ml-2 text-sm text-gray-700">Invoice</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="has_faktur_pajak" value="1" class="rounded border-gray-300 text-blue-600">
                                        <span class="ml-2 text-sm text-gray-700">Faktur Pajak</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="has_surat_jalan" value="1" class="rounded border-gray-300 text-blue-600">
                                        <span class="ml-2 text-sm text-gray-700">Surat Jalan</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Notes -->
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Dokumen</label>
                                <textarea name="document_notes" rows="2" 
                                          class="w-full border-gray-300 rounded-lg shadow-sm"
                                          placeholder="Catatan tambahan untuk kelengkapan dokumen...">{{ old('document_notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- PO Invoices Container -->
                    <div id="poInvoicesContainer">
                        <!-- PO Invoice items will be added here -->
                    </div>

                    <!-- Add PO Button -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                        <div class="p-6">
                            <button type="button" onclick="addPOInvoice()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                                + Tambah PO Invoice
                            </button>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 flex gap-3">
                            <button type="submit" id="submitBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                                👁️ Preview Tiket
                            </button>
                            <a href="{{ route('tickets.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-2 rounded-lg">
                                Cancel
                            </a>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    @push('scripts')
    <script>
        let poInvoiceCounter = 0;
        const purchaseOrders = @json($purchaseOrders);

        // Add first PO on load
        document.addEventListener('DOMContentLoaded', function() {
            addPOInvoice();
        });

        function addPOInvoice() {
            const container = document.getElementById('poInvoicesContainer');
            const poIndex = poInvoiceCounter++;
            
            const poInvoiceHtml = `
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 po-invoice-card" id="poInvoice_${poIndex}">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold text-lg">Invoice PO #${poIndex + 1}</h3>
                            ${poIndex > 0 ? `<button type="button" onclick="removePOInvoice(${poIndex})" class="text-red-600 hover:text-red-800">Hapus</button>` : ''}
                        </div>

                        <!-- PO Selection -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih PO *</label>
                            <select name="po_invoices[${poIndex}][purchase_order_id]" 
                                    id="poSelect_${poIndex}" 
                                    required 
                                    onchange="loadPOItems(${poIndex})"
                                    class="w-full border-gray-300 rounded-lg shadow-sm">
                                <option value="">-- Pilih PO --</option>
                                ${purchaseOrders.map(po => `
                                    <option value="${po.id}" data-po='${JSON.stringify(po)}'>
                                        ${po.po_number} - ${new Date(po.po_date).toLocaleDateString('id-ID')} 
                                        (${po.items.length} items, Status: ${po.status.charAt(0).toUpperCase() + po.status.slice(1)})
                                    </option>
                                `).join('')}
                            </select>
                        </div>

                        <!-- Invoice Details -->
                        <div class="grid md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Invoice *</label>
                                <input type="text" 
                                       name="po_invoices[${poIndex}][invoice_number]" 
                                       required 
                                       class="w-full border-gray-300 rounded-lg shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">No. Faktur Pajak</label>
                                <input type="text" 
                                       name="po_invoices[${poIndex}][tax_invoice_number]" 
                                       class="w-full border-gray-300 rounded-lg shadow-sm"
                                       placeholder="Opsional">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Invoice *</label>
                                <input type="date" 
                                       name="po_invoices[${poIndex}][invoice_date]" 
                                       required 
                                       value="${new Date().toISOString().split('T')[0]}"
                                       class="w-full border-gray-300 rounded-lg shadow-sm">
                            </div>
                        </div>

                        <!-- Items Container -->
                        <div id="itemsSection_${poIndex}" class="hidden">
                            <h4 class="font-medium mb-3">Pilih Items untuk Invoice</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 text-sm">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="w-12 px-3 py-2">
                                                <input type="checkbox" class="rounded border-gray-300" onclick="selectAllItems(${poIndex}, this.checked)">
                                            </th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Part Name</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Spec</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Available</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Qty</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Payment</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">%</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Unit Price</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="itemsBody_${poIndex}" class="bg-white divide-y divide-gray-200">
                                    </tbody>
                                    <tfoot class="bg-gray-50 font-semibold">
                                        <tr>
                                            <td colspan="9" class="px-3 py-2 text-right">Subtotal:</td>
                                            <td class="px-3 py-2" id="subtotal_${poIndex}">Rp 0</td>
                                        </tr>
                                        <tr>
                                            <td colspan="9" class="px-3 py-2 text-right">PPN (11%):</td>
                                            <td class="px-3 py-2" id="ppn_${poIndex}">Rp 0</td>
                                        </tr>
                                        <tr>
                                            <td colspan="9" class="px-3 py-2 text-right">PPh23 (2% - Jasa Only):</td>
                                            <td class="px-3 py-2 text-green-600" id="pph23_${poIndex}">Rp 0</td>
                                        </tr>
                                        <tr class="text-base">
                                            <td colspan="9" class="px-3 py-2 text-right">Total:</td>
                                            <td class="px-3 py-2" id="total_${poIndex}">Rp 0</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            container.insertAdjacentHTML('beforeend', poInvoiceHtml);
        }

        function removePOInvoice(index) {
            document.getElementById(`poInvoice_${index}`).remove();
        }

        function loadPOItems(poIndex) {
            const select = document.getElementById(`poSelect_${poIndex}`);
            const selectedOption = select.options[select.selectedIndex];
            
            if (!selectedOption.value) {
                document.getElementById(`itemsSection_${poIndex}`).classList.add('hidden');
                return;
            }

            const po = JSON.parse(selectedOption.dataset.po);
            const itemsBody = document.getElementById(`itemsBody_${poIndex}`);
            itemsBody.innerHTML = '';

            po.items.forEach((item, itemIndex) => {
                if (item.remaining_quantity > 0) {
                    const typeColor = item.transaction_type === 'jasa' ? 'text-purple-600 font-semibold' : 'text-green-600';
                    const row = `
                        <tr id="row_${poIndex}_${itemIndex}">
                            <td class="px-3 py-2">
                                <input type="checkbox" class="item-checkbox-${poIndex} rounded border-gray-300" 
                                       onchange="toggleItem(${poIndex}, ${itemIndex}, this.checked)">
                            </td>
                            <td class="px-3 py-2">${item.part_name}</td>
                            <td class="px-3 py-2 text-xs">${item.specification || '-'}</td>
                            <td class="px-3 py-2">
                                <span class="${typeColor}">${item.transaction_type.toUpperCase()}</span>
                            </td>
                            <td class="px-3 py-2">${parseFloat(item.remaining_quantity).toFixed(2)}</td>
                            <td class="px-3 py-2">
                                <input type="number" 
                                       id="qty_${poIndex}_${itemIndex}"
                                       name="po_invoices[${poIndex}][items][${itemIndex}][quantity]"
                                       step="0.01" 
                                       min="0.01" 
                                       max="${item.remaining_quantity}"
                                       value="${item.remaining_quantity}"
                                       disabled
                                       class="w-20 border-gray-300 rounded shadow-sm text-sm"
                                       onchange="calculatePOTotals(${poIndex})">
                                <input type="hidden" 
                                       name="po_invoices[${poIndex}][items][${itemIndex}][po_item_id]" 
                                       value="${item.id}">
                            </td>
                            <td class="px-3 py-2">
                                <select id="payment_${poIndex}_${itemIndex}"
                                        name="po_invoices[${poIndex}][items][${itemIndex}][payment_type]"
                                        disabled
                                        class="w-28 border-gray-300 rounded shadow-sm text-xs"
                                        onchange="togglePercentage(${poIndex}, ${itemIndex}); calculatePOTotals(${poIndex})">
                                    <option value="full">Full</option>
                                    <option value="dp">DP</option>
                                    <option value="termin_2">Termin 2</option>
                                    <option value="pelunasan">Pelunasan</option>
                                </select>
                            </td>
                            <td class="px-3 py-2">
                                <input type="number"
                                       id="percentage_${poIndex}_${itemIndex}"
                                       name="po_invoices[${poIndex}][items][${itemIndex}][payment_percentage]"
                                       step="0.01"
                                       min="0"
                                       max="100"
                                       value="100"
                                       disabled
                                       class="w-16 border-gray-300 rounded shadow-sm text-sm hidden"
                                       onchange="calculatePOTotals(${poIndex})">
                            </td>
                            <td class="px-3 py-2 text-xs">Rp ${parseInt(item.unit_price).toLocaleString('id-ID')}</td>
                            <td class="px-3 py-2 font-medium" id="itemTotal_${poIndex}_${itemIndex}">Rp 0</td>
                        </tr>
                    `;
                    itemsBody.insertAdjacentHTML('beforeend', row);
                }
            });

            document.getElementById(`itemsSection_${poIndex}`).classList.remove('hidden');
        }

        function selectAllItems(poIndex, checked) {
            document.querySelectorAll(`.item-checkbox-${poIndex}`).forEach((cb, index) => {
                cb.checked = checked;
                toggleItem(poIndex, index, checked);
            });
        }

        function toggleItem(poIndex, itemIndex, checked) {
            const qtyInput = document.getElementById(`qty_${poIndex}_${itemIndex}`);
            const paymentSelect = document.getElementById(`payment_${poIndex}_${itemIndex}`);
            
            qtyInput.disabled = !checked;
            paymentSelect.disabled = !checked;
            
            if (checked) {
                togglePercentage(poIndex, itemIndex);
            } else {
                document.getElementById(`percentage_${poIndex}_${itemIndex}`).classList.add('hidden');
            }
            
            calculatePOTotals(poIndex);
        }

        function togglePercentage(poIndex, itemIndex) {
            const paymentType = document.getElementById(`payment_${poIndex}_${itemIndex}`).value;
            const percentageInput = document.getElementById(`percentage_${poIndex}_${itemIndex}`);
            
            if (paymentType === 'dp' || paymentType === 'termin_2') {
                percentageInput.classList.remove('hidden');
                percentageInput.disabled = false;
            } else {
                percentageInput.classList.add('hidden');
                percentageInput.disabled = true;
                percentageInput.value = 100;
            }
        }

        function calculatePOTotals(poIndex) {
            const select = document.getElementById(`poSelect_${poIndex}`);
            const po = JSON.parse(select.options[select.selectedIndex].dataset.po);
            
            let subtotal = 0;
            let pph23Total = 0;
            
            po.items.forEach((item, itemIndex) => {
                const checkbox = document.querySelector(`#row_${poIndex}_${itemIndex} input[type="checkbox"]`);
                const qtyInput = document.getElementById(`qty_${poIndex}_${itemIndex}`);
                const paymentType = document.getElementById(`payment_${poIndex}_${itemIndex}`);
                const percentage = document.getElementById(`percentage_${poIndex}_${itemIndex}`);
                const totalEl = document.getElementById(`itemTotal_${poIndex}_${itemIndex}`);
                
                if (checkbox && checkbox.checked && qtyInput) {
                    const qty = parseFloat(qtyInput.value) || 0;
                    let baseTotal = qty * item.unit_price;
                    
                    // Apply payment percentage for DP/Termin
                    if (paymentType.value === 'dp' || paymentType.value === 'termin_2') {
                        const pct = parseFloat(percentage.value) || 100;
                        baseTotal = (baseTotal * pct) / 100;
                    }
                    
                    subtotal += baseTotal;
                    
                    // Calculate PPh23 only for JASA
                    if (item.transaction_type === 'jasa') {
                        pph23Total += baseTotal * 0.02;
                    }
                    
                    totalEl.textContent = 'Rp ' + parseInt(baseTotal).toLocaleString('id-ID');
                } else if (totalEl) {
                    totalEl.textContent = 'Rp 0';
                }
            });

            const ppn = subtotal * 0.11;
            const total = subtotal + ppn + pph23Total; // Semua pajak ditambahkan

            document.getElementById(`subtotal_${poIndex}`).textContent = 'Rp ' + parseInt(subtotal).toLocaleString('id-ID');
            document.getElementById(`ppn_${poIndex}`).textContent = 'Rp ' + parseInt(ppn).toLocaleString('id-ID');
            document.getElementById(`pph23_${poIndex}`).textContent = 'Rp ' + parseInt(pph23Total).toLocaleString('id-ID');
            document.getElementById(`total_${poIndex}`).textContent = 'Rp ' + parseInt(total).toLocaleString('id-ID');
        }
    </script>
    @endpush
</x-app-layout>