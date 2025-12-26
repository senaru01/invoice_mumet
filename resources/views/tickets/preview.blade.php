<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Preview Tiket Invoice
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Warning Box -->
            <div class="mb-6 bg-yellow-50 border-l-4 border-yellow-400 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        ⚠️
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-yellow-700">
                            <strong>Periksa data dengan teliti!</strong> Setelah disubmit, data tidak bisa diubah.
                            Gunakan "Save as Draft" jika masih ingin edit nanti.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Ticket Info Preview -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="font-semibold text-lg mb-4">Informasi Tiket</h3>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Tanggal Pengiriman</p>
                            <p class="font-medium">{{ \Carbon\Carbon::parse($ticketData['delivery_date'])->format('d/m/Y') }}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Kelengkapan Dokumen</p>
                            <div class="flex gap-2 flex-wrap">
                                @if($ticketData['has_po'] ?? true)
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded">✓ PO</span>
                                @endif
                                @if($ticketData['has_invoice_doc'] ?? true)
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded">✓ Invoice</span>
                                @endif
                                @if($ticketData['has_faktur_pajak'] ?? false)
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded">✓ Faktur Pajak</span>
                                @endif
                                @if($ticketData['has_surat_jalan'] ?? false)
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded">✓ Surat Jalan</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if(!empty($ticketData['document_notes']))
                    <div class="mt-4 p-3 bg-gray-50 rounded">
                        <p class="text-sm"><strong>Catatan:</strong> {{ $ticketData['document_notes'] }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Invoices Preview -->
            @foreach($poInvoices as $index => $poInvoice)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="font-semibold text-lg mb-4">Invoice #{{ $index + 1 }}</h3>
                    
                    <!-- Invoice Header -->
                    <div class="grid md:grid-cols-3 gap-4 mb-4 pb-4 border-b">
                        <div>
                            <p class="text-sm text-gray-600">PO Number</p>
                            <p class="font-medium">{{ $poInvoice['po']->po_number }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Nomor Invoice</p>
                            <p class="font-medium">{{ $poInvoice['invoice_number'] }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">No. Faktur Pajak</p>
                            <p class="font-medium">{{ $poInvoice['tax_invoice_number'] ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div class="overflow-x-auto mb-4">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Part Name</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Spec</th>
                                    <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                    <th class="px-3 py-2 text-right text-xs font-medium text-gray-500 uppercase">Qty</th>
                                    <th class="px-3 py-2 text-right text-xs font-medium text-gray-500 uppercase">Unit Price</th>
                                    <th class="px-3 py-2 text-center text-xs font-medium text-gray-500 uppercase">Payment</th>
                                    <th class="px-3 py-2 text-right text-xs font-medium text-gray-500 uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($poInvoice['items'] as $item)
                                <tr>
                                    <td class="px-3 py-2 text-sm">{{ $item['part_name'] }}</td>
                                    <td class="px-3 py-2 text-sm text-gray-600">{{ $item['specification'] ?? '-' }}</td>
                                    <td class="px-3 py-2 text-sm">
                                        <span class="px-2 py-1 text-xs rounded
                                            {{ $item['transaction_type'] === 'jasa' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                            {{ strtoupper($item['transaction_type']) }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-2 text-sm text-right">{{ number_format($item['quantity'], 2) }}</td>
                                    <td class="px-3 py-2 text-sm text-right">Rp {{ number_format($item['unit_price'], 0, ',', '.') }}</td>
                                    <td class="px-3 py-2 text-sm text-center">
                                        <span class="px-2 py-1 text-xs rounded-full
                                            @if($item['payment_type'] === 'full') bg-green-100 text-green-800
                                            @elseif($item['payment_type'] === 'dp') bg-blue-100 text-blue-800
                                            @elseif($item['payment_type'] === 'termin_2') bg-yellow-100 text-yellow-800
                                            @else bg-purple-100 text-purple-800
                                            @endif">
                                            {{ strtoupper($item['payment_type']) }}
                                            @if(in_array($item['payment_type'], ['dp', 'termin_2']))
                                                ({{ $item['payment_percentage'] }}%)
                                            @endif
                                        </span>
                                    </td>
                                    <td class="px-3 py-2 text-sm text-right font-medium">Rp {{ number_format($item['total_price'], 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Invoice Summary -->
                    <div class="bg-gray-50 p-4 rounded">
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Barang:</span>
                                <span class="font-medium">Rp {{ number_format($poInvoice['barang'], 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Jasa:</span>
                                <span class="font-medium">Rp {{ number_format($poInvoice['jasa'], 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between pt-2 border-t">
                                <span class="text-gray-600">Subtotal 1:</span>
                                <span class="font-semibold">Rp {{ number_format($poInvoice['subtotal1'], 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">PPN (11%):</span>
                                <span class="font-medium text-green-600">Rp {{ number_format($poInvoice['tax'], 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between pt-2 border-t">
                                <span class="text-gray-600">Subtotal 2:</span>
                                <span class="font-semibold">Rp {{ number_format($poInvoice['subtotal2'], 0, ',', '.') }}</span>
                            </div>
                            @if($poInvoice['pph23'] > 0)
                            <div class="flex justify-between">
                                <span class="text-gray-600">PPh23 (2%):</span>
                                <span class="font-medium text-green-600">Rp {{ number_format($poInvoice['pph23'], 0, ',', '.') }}</span>
                            </div>
                            @endif
                            <div class="flex justify-between pt-3 border-t-2 border-gray-300">
                                <span class="font-bold text-lg">GRAND TOTAL:</span>
                                <span class="font-bold text-lg text-blue-600">Rp {{ number_format($poInvoice['grand_total'], 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Action Buttons -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex gap-3 justify-between">
                        <a href="{{ route('tickets.create') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-3 rounded-lg">
                            ← Kembali Edit
                        </a>
                        
                        <div class="flex gap-3">
                            <!-- Save as Draft -->
                            <form action="{{ route('tickets.saveDraft') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="ticket_data" value="{{ json_encode(session('ticket_draft')) }}">
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg">
                                    💾 Save as Draft
                                </button>
                            </form>

                            <!-- Submit Final -->
                            <form action="{{ route('tickets.store') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="ticket_data" value="{{ json_encode(session('ticket_draft')) }}">
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold">
                                    ✓ Submit Tiket
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>