<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                PO Detail: {{ $purchaseOrder->po_number }}
            </h2>
            <a href="{{ route('admin.purchase-orders.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded-lg">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- PO Header Info -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div>
                            <p class="text-sm text-gray-600">PO Number</p>
                            <p class="font-semibold">{{ $purchaseOrder->po_number }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">PO Date</p>
                            <p class="font-semibold">{{ $purchaseOrder->po_date->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Supplier</p>
                            <p class="font-semibold">{{ $purchaseOrder->supplier->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Status</p>
                            <p>
                                @if($purchaseOrder->status == 'open')
                                    <span class="px-3 py-1 text-sm rounded bg-green-100 text-green-800">Open</span>
                                @elseif($purchaseOrder->status == 'partial')
                                    <span class="px-3 py-1 text-sm rounded bg-yellow-100 text-yellow-800">Partial</span>
                                @else
                                    <span class="px-3 py-1 text-sm rounded bg-gray-100 text-gray-800">Closed</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PO Items -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-lg mb-4">PO Items</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Part Name</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Specification</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Qty</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Invoiced</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Remaining</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Unit</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Unit Price</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($purchaseOrder->items as $item)
                                    <tr class="{{ $item->remaining_quantity <= 0 ? 'bg-gray-50' : '' }}">
                                        <td class="px-4 py-3">{{ $item->part_name }}</td>
                                        <td class="px-4 py-3 text-sm">{{ $item->specification }}</td>
                                        <td class="px-4 py-3">{{ number_format($item->quantity, 2) }}</td>
                                        <td class="px-4 py-3">{{ number_format($item->invoiced_quantity, 2) }}</td>
                                        <td class="px-4 py-3">
                                            <span class="{{ $item->remaining_quantity > 0 ? 'text-green-600 font-semibold' : 'text-gray-400' }}">
                                                {{ number_format($item->remaining_quantity, 2) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">{{ $item->unit }}</td>
                                        <td class="px-4 py-3">Rp {{ number_format($item->unit_price, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3">Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-gray-50 font-semibold">
                                <tr>
                                    <td colspan="7" class="px-4 py-3 text-right">Subtotal:</td>
                                    <td class="px-4 py-3">Rp {{ number_format($purchaseOrder->subtotal, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="px-4 py-3 text-right">PPN (11%):</td>
                                    <td class="px-4 py-3">Rp {{ number_format($purchaseOrder->ppn_amount, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="px-4 py-3 text-right">PPh23 (2%):</td>
                                    <td class="px-4 py-3 text-red-600">- Rp {{ number_format($purchaseOrder->pph23_amount, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="text-lg">
                                    <td colspan="7" class="px-4 py-3 text-right">Total Amount:</td>
                                    <td class="px-4 py-3">Rp {{ number_format($purchaseOrder->total_amount, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Invoice History -->
            @if($purchaseOrder->invoices->count() > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="font-semibold text-lg mb-4">Invoice History</h3>
                        <div class="space-y-4">
                            @foreach($purchaseOrder->invoices as $invoice)
                                <div class="border rounded-lg p-4">
                                    <div class="flex justify-between items-start mb-3">
                                        <div>
                                            <p class="font-semibold">{{ $invoice->invoice_number }}</p>
                                            <p class="text-sm text-gray-600">Ticket: {{ $invoice->ticket->ticket_number }}</p>
                                            <p class="text-sm text-gray-600">Date: {{ $invoice->invoice_date->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-semibold">Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}</p>
                                            <span class="text-xs px-2 py-1 rounded {{ $invoice->ticket->status == 'received' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ ucfirst($invoice->ticket->status) }}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3 border-t pt-3">
                                        <p class="text-sm font-medium mb-2">Items:</p>
                                        <div class="space-y-1">
                                            @foreach($invoice->items as $item)
                                                <div class="flex justify-between text-sm">
                                                    <span>{{ $item->part_name }} ({{ $item->specification }})</span>
                                                    <span>{{ number_format($item->quantity, 2) }} {{ $item->unit }} × Rp {{ number_format($item->unit_price, 0, ',', '.') }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>