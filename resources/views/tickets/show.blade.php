<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Tiket {{ $ticket->ticket_number }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('tickets.print', $ticket) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    🖨️ Print Tiket
                </a>
                <a href="{{ route('tickets.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg">
                    Kembali
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Ticket Info -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="font-semibold text-lg mb-4">Informasi Tiket</h3>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">Nomor Tiket</p>
                            <p class="font-semibold text-lg">{{ $ticket->ticket_number }}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Status</p>
                            <p>
                                <span class="px-3 py-1 rounded-full text-sm
                                    @if($ticket->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($ticket->status === 'received') bg-green-100 text-green-800
                                    @elseif($ticket->status === 'completed') bg-blue-100 text-blue-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($ticket->status) }}
                                </span>
                            </p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Company</p>
                            <p class="font-medium">{{ $ticket->company->name ?? 'N/A' }}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Dibuat oleh</p>
                            <p class="font-medium">{{ $ticket->user->name }}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Tanggal Dibuat</p>
                            <p class="font-medium">{{ $ticket->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-600">Rencana Kirim</p>
                            <p class="font-medium">{{ \Carbon\Carbon::parse($ticket->planned_delivery_date)->format('d/m/Y') }}</p>
                        </div>
                    </div>

                    <!-- Document Checklist -->
                    <div class="mt-6 border-t pt-4">
                        <p class="text-sm font-medium text-gray-700 mb-3">Kelengkapan Dokumen:</p>
                        <div class="grid md:grid-cols-2 gap-2">
                            <div class="flex items-center">
                                @if($ticket->has_po)
                                    <span class="text-green-600">✓</span>
                                    <span class="ml-2 text-sm">PO (Purchase Order)</span>
                                @else
                                    <span class="text-red-600">✗</span>
                                    <span class="ml-2 text-sm text-gray-400">PO (Purchase Order)</span>
                                @endif
                            </div>
                            
                            <div class="flex items-center">
                                @if($ticket->has_invoice)
                                    <span class="text-green-600">✓</span>
                                    <span class="ml-2 text-sm">Invoice</span>
                                @else
                                    <span class="text-red-600">✗</span>
                                    <span class="ml-2 text-sm text-gray-400">Invoice</span>
                                @endif
                            </div>
                            
                            <div class="flex items-center">
                                @if($ticket->has_faktur_pajak)
                                    <span class="text-green-600">✓</span>
                                    <span class="ml-2 text-sm">Faktur Pajak</span>
                                @else
                                    <span class="text-red-600">✗</span>
                                    <span class="ml-2 text-sm text-gray-400">Faktur Pajak</span>
                                @endif
                            </div>
                            
                            <div class="flex items-center">
                                @if($ticket->has_surat_jalan)
                                    <span class="text-green-600">✓</span>
                                    <span class="ml-2 text-sm">Surat Jalan</span>
                                @else
                                    <span class="text-red-600">✗</span>
                                    <span class="ml-2 text-sm text-gray-400">Surat Jalan</span>
                                @endif
                            </div>
                        </div>
                        
                        @if($ticket->document_notes)
                        <div class="mt-3 p-3 bg-yellow-50 border-l-4 border-yellow-400">
                            <p class="text-sm"><strong>Catatan:</strong> {{ $ticket->document_notes }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Invoices List -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-lg mb-4">Daftar Invoice ({{ $ticket->invoices->count() }})</h3>
                    
                    @forelse($ticket->invoices as $invoice)
                    <div class="border rounded-lg p-4 mb-4">
                        <!-- Invoice Header -->
                        <div class="grid md:grid-cols-3 gap-4 mb-4 pb-4 border-b">
                            <div>
                                <p class="text-sm text-gray-600">Nomor Invoice</p>
                                <p class="font-semibold text-lg">{{ $invoice->invoice_number }}</p>
                            </div>
                            
                            <div>
                                <p class="text-sm text-gray-600">No. Faktur Pajak</p>
                                <p class="font-medium">{{ $invoice->no_seri_fp ?? $invoice->tax_invoice_number ?? '-' }}</p>
                            </div>
                            
                            <div>
                                <p class="text-sm text-gray-600">Tanggal Invoice</p>
                                <p class="font-medium">{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y') }}</p>
                            </div>
                        </div>

                        <!-- PO Reference (with null check) -->
                        @if($invoice->purchaseOrder)
                        <div class="mb-4 p-3 bg-blue-50 rounded">
                            <p class="text-sm text-gray-600">PO Reference</p>
                            <p class="font-medium">{{ $invoice->purchaseOrder->po_number }}</p>
                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($invoice->purchaseOrder->po_date)->format('d/m/Y') }}</p>
                        </div>
                        @endif

                        <!-- Invoice Breakdown -->
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-semibold mb-3">Breakdown Invoice</h4>
                            
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Barang:</span>
                                    <span class="font-medium">Rp {{ number_format($invoice->barang, 0, ',', '.') }}</span>
                                </div>
                                
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jasa:</span>
                                    <span class="font-medium">Rp {{ number_format($invoice->jasa, 0, ',', '.') }}</span>
                                </div>
                                
                                @if($invoice->discount > 0)
                                <div class="flex justify-between text-red-600">
                                    <span>Discount:</span>
                                    <span class="font-medium">- Rp {{ number_format($invoice->discount, 0, ',', '.') }}</span>
                                </div>
                                @endif
                                
                                <div class="flex justify-between pt-2 border-t">
                                    <span class="text-gray-600">Subtotal 1:</span>
                                    <span class="font-semibold">Rp {{ number_format($invoice->subtotal1, 0, ',', '.') }}</span>
                                </div>
                                
                                <div class="flex justify-between">
                                    <span class="text-gray-600">PPN (11%):</span>
                                    <span class="font-medium text-green-600">Rp {{ number_format($invoice->tax, 0, ',', '.') }}</span>
                                </div>
                                
                                <div class="flex justify-between pt-2 border-t">
                                    <span class="text-gray-600">Subtotal 2:</span>
                                    <span class="font-semibold">Rp {{ number_format($invoice->subtotal2, 0, ',', '.') }}</span>
                                </div>
                                
                                @if($invoice->pph23 > 0)
                                <div class="flex justify-between">
                                    <span class="text-gray-600">PPh23 (2%):</span>
                                    <span class="font-medium text-green-600">Rp {{ number_format($invoice->pph23, 0, ',', '.') }}</span>
                                </div>
                                @endif
                                
                                <div class="flex justify-between pt-3 border-t-2 border-gray-300">
                                    <span class="font-bold text-lg">GRAND TOTAL:</span>
                                    <span class="font-bold text-lg text-blue-600">Rp {{ number_format($invoice->grand_total, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Items Detail (if exists) -->
                        @if($invoice->items && $invoice->items->count() > 0)
                        <div class="mt-4">
                            <h4 class="font-semibold mb-3">Detail Items</h4>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Part Name</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Spec</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Qty</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Unit</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Unit Price</th>
                                            <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase">Payment</th>
                                            <th class="px-3 py-2 text-right text-xs font-medium text-gray-500 uppercase">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($invoice->items as $item)
                                        <tr>
                                            <td class="px-3 py-2 text-sm">{{ $item->part_name }}</td>
                                            <td class="px-3 py-2 text-sm text-gray-600">{{ $item->specification ?? '-' }}</td>
                                            <td class="px-3 py-2 text-sm">{{ number_format($item->quantity, 2) }}</td>
                                            <td class="px-3 py-2 text-sm">{{ $item->unit }}</td>
                                            <td class="px-3 py-2 text-sm">Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                                            <td class="px-3 py-2 text-sm">
                                                <span class="px-2 py-1 text-xs rounded-full
                                                    @if($item->payment_type === 'full') bg-green-100 text-green-800
                                                    @elseif($item->payment_type === 'dp') bg-blue-100 text-blue-800
                                                    @elseif($item->payment_type === 'termin_2') bg-yellow-100 text-yellow-800
                                                    @else bg-purple-100 text-purple-800
                                                    @endif">
                                                    {{ strtoupper($item->payment_type) }}
                                                    @if(in_array($item->payment_type, ['dp', 'termin_2']))
                                                        ({{ $item->payment_percentage }}%)
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="px-3 py-2 text-sm text-right font-medium">Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                    @empty
                    <div class="text-center py-8 text-gray-500">
                        <p>Belum ada invoice untuk tiket ini.</p>
                    </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>