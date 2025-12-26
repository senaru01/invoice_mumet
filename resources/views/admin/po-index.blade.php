<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Purchase Orders
            </h2>
            <a href="{{ route('admin.purchase-orders.import') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                Import PO
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Filter Status -->
                    <div class="mb-4 flex gap-2">
                        <a href="{{ route('admin.purchase-orders.index') }}" 
                           class="px-4 py-2 rounded {{ !request('status') ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                            All
                        </a>
                        <a href="{{ route('admin.purchase-orders.index', ['status' => 'open']) }}" 
                           class="px-4 py-2 rounded {{ request('status') == 'open' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                            Open
                        </a>
                        <a href="{{ route('admin.purchase-orders.index', ['status' => 'partial']) }}" 
                           class="px-4 py-2 rounded {{ request('status') == 'partial' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                            Partial
                        </a>
                        <a href="{{ route('admin.purchase-orders.index', ['status' => 'closed']) }}" 
                           class="px-4 py-2 rounded {{ request('status') == 'closed' ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                            Closed
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">PO Number</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Supplier</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Items</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($pos as $po)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $po->po_number }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $po->po_date->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4">{{ $po->supplier->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $po->items->count() }} items</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($po->total_amount, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($po->status == 'open')
                                                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800">Open</span>
                                            @elseif($po->status == 'partial')
                                                <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-800">Partial</span>
                                            @else
                                                <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-800">Closed</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <a href="{{ route('admin.purchase-orders.show', $po) }}" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                            @if($po->invoices->count() == 0)
                                                <form action="{{ route('admin.purchase-orders.destroy', $po) }}" method="POST" class="inline" onsubmit="return confirm('Hapus PO ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">Belum ada PO</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $pos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>