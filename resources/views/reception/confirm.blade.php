<x-reception-layout>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg p-8 border border-gray-200">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Konfirmasi Penerimaan Invoice</h1>
                <p class="text-gray-600">Periksa detail invoice sebelum konfirmasi</p>
            </div>

            <!-- Ticket Info -->
            <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                    <div>
                        <span class="text-gray-600">Nomor Tiket:</span>
                        <div class="font-bold text-gray-900">{{ $ticket->ticket_number }}</div>
                    </div>
                    <div>
                        <span class="text-gray-600">Company:</span>
                        <div class="font-bold text-gray-900">{{ $ticket->company->name }}</div>
                    </div>
                    <div>
                        <span class="text-gray-600">Jumlah Invoice:</span>
                        <div class="font-bold text-blue-600">{{ $ticket->invoice_count }}</div>
                    </div>
                    <div>
                        <span class="text-gray-600">Diserahkan:</span>
                        <div class="font-bold text-gray-900">{{ $ticket->user->name }}</div>
                    </div>
                </div>
            </div>

            <!-- Invoice List -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Daftar Invoice</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 border border-gray-200 rounded-lg">
                        <thead class="bg-emerald-600">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase">No</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase">No Invoice</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase">No Seri F/P</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase">Tanggal</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-white uppercase">Currency</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($ticket->invoices as $index => $invoice)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-center font-semibold">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $invoice->invoice_number }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $invoice->no_seri_fp }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $invoice->invoice_date->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $invoice->currency }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Confirmation Form -->
            <form action="{{ route('reception.receive', $ticket) }}" method="POST">
                @csrf
                
                <!-- Hidden field - auto-fill dengan "System" -->
                <input type="hidden" name="received_by" value="System">
                
                <!-- Info Box -->
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-emerald-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-emerald-800">Invoice akan diterima oleh: <strong>System</strong></p>
                            <p class="text-sm text-emerald-700 mt-1">Status akan otomatis berubah menjadi "Diterima" dan bukti terima akan dicetak.</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between space-x-4">
                    <a href="{{ route('reception.index') }}" 
                       class="flex-1 text-center px-6 py-3 border-2 border-gray-400 rounded-lg text-gray-700 font-semibold hover:bg-gray-100 transition">
                        ← Batal
                    </a>
                    <button type="submit" 
                            class="flex-1 px-6 py-3 bg-emerald-600 text-white rounded-lg font-semibold hover:bg-emerald-700 shadow-md hover:shadow-lg transition">
                        ✓ Konfirmasi Penerimaan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-reception-layout>