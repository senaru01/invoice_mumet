<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Tiket') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('tickets.index') }}" class="text-indigo-600 hover:text-indigo-900 flex items-center">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Daftar Tiket
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-2xl font-bold">{{ $ticket->ticket_number }}</h1>
                        <p class="text-indigo-100 mt-1">Dibuat: {{ $ticket->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    <div class="text-right">
                        @if($ticket->status === 'draft')
                            <span class="px-3 py-1 bg-gray-500 text-white text-sm font-semibold rounded-full">
                                Draft
                            </span>
                        @elseif($ticket->status === 'submitted')
                            <span class="px-3 py-1 bg-yellow-500 text-white text-sm font-semibold rounded-full">
                                Submitted
                            </span>
                        @elseif($ticket->status === 'received')
                            <span class="px-3 py-1 bg-green-500 text-white text-sm font-semibold rounded-full">
                                Diterima
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 flex justify-end space-x-3">
                @if($ticket->status === 'submitted')
                    <a href="{{ route('tickets.print', $ticket) }}" target="_blank" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                        </svg>
                        Print Tiket
                    </a>
                @endif
            </div>

            <div class="p-6">
                <!-- Company Info -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Supplier</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 bg-gray-50 rounded-lg">
                        <div>
                            <span class="text-sm text-gray-600">Company:</span>
                            <div class="font-semibold text-gray-900">{{ $ticket->company->name }}</div>
                        </div>
                        <div>
                            <span class="text-sm text-gray-600">Jenis Usaha:</span>
                            <div class="font-semibold text-gray-900">{{ $ticket->company->description }}</div>
                        </div>
                        <div>
                            <span class="text-sm text-gray-600">Dibuat Oleh:</span>
                            <div class="font-semibold text-gray-900">{{ $ticket->user->name }}</div>
                        </div>
                        <div>
                            <span class="text-sm text-gray-600">Rencana Kirim:</span>
                            <div class="font-semibold text-gray-900">{{ $ticket->planned_delivery_date->format('d/m/Y') }}</div>
                        </div>
                    </div>
                </div>

                <!-- Document Checklist -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Kelengkapan Dokumen</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <div class="flex items-center space-x-2 p-3 rounded-lg {{ $ticket->has_invoice ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                            <span class="text-xl">{{ $ticket->has_invoice ? '✅' : '❌' }}</span>
                            <span class="font-medium">Invoice</span>
                        </div>
                        <div class="flex items-center space-x-2 p-3 rounded-lg {{ $ticket->has_faktur_pajak ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                            <span class="text-xl">{{ $ticket->has_faktur_pajak ? '✅' : '❌' }}</span>
                            <span class="font-medium">Faktur Pajak</span>
                        </div>
                        <div class="flex items-center space-x-2 p-3 rounded-lg {{ $ticket->has_surat_jalan ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                            <span class="text-xl">{{ $ticket->has_surat_jalan ? '✅' : '❌' }}</span>
                            <span class="font-medium">Surat Jalan</span>
                        </div>
                        <div class="flex items-center space-x-2 p-3 rounded-lg {{ $ticket->has_po ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                            <span class="text-xl">{{ $ticket->has_po ? '✅' : '❌' }}</span>
                            <span class="font-medium">PO</span>
                        </div>
                    </div>
                    @if($ticket->document_notes)
                    <div class="mt-4 p-4 bg-yellow-50 border-l-4 border-yellow-400 rounded">
                        <p class="text-sm font-medium text-yellow-800">Catatan:</p>
                        <p class="text-sm text-yellow-700 mt-1">{{ $ticket->document_notes }}</p>
                    </div>
                    @endif
                </div>

                <!-- Invoices List -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        Daftar Invoice ({{ $ticket->invoice_count }})
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border border-gray-200 rounded-lg">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No Invoice</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No Seri F/P</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Currency</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Barang</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Jasa</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Discount</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Subtotal 1</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Tax 11%</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">PPh 23</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Grand Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($ticket->invoices as $index => $invoice)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $invoice->invoice_number }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600">{{ $invoice->no_seri_fp }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600">{{ $invoice->invoice_date->format('d/m/Y') }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600">{{ $invoice->currency }}</td>
                                    <td class="px-4 py-3 text-sm text-right">{{ number_format($invoice->barang, 2, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-sm text-right">{{ number_format($invoice->jasa, 2, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-sm text-right text-red-600">{{ number_format($invoice->discount, 2, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-sm text-right font-medium">{{ number_format($invoice->subtotal1, 2, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-sm text-right">{{ number_format($invoice->tax, 2, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-sm text-right text-orange-600">{{ number_format($invoice->pph23, 2, ',', '.') }}</td>
                                    <td class="px-4 py-3 text-sm text-right font-bold text-indigo-600">{{ number_format($invoice->grand_total, 2, ',', '.') }}</td>
                                </tr>
                                @endforeach
                                <tr class="bg-gray-100 font-bold">
                                    <td colspan="11" class="px-4 py-3 text-right">TOTAL:</td>
                                    <td class="px-4 py-3 text-right text-indigo-600">{{ number_format($ticket->total_amount, 2, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Received Info -->
                @if($ticket->status === 'received')
                <div class="p-4 bg-green-50 border border-green-200 rounded-lg">
                    <h4 class="font-semibold text-green-800 mb-2">Informasi Penerimaan</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-sm">
                        <div>
                            <span class="text-green-700">Diterima Tanggal:</span>
                            <div class="font-semibold text-green-900">{{ $ticket->received_at->format('d/m/Y H:i') }}</div>
                        </div>
                        <div>
                            <span class="text-green-700">Diterima Oleh:</span>
                            <div class="font-semibold text-green-900">{{ $ticket->received_by }}</div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>