<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bukti Penerimaan Invoice') }}
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-sm p-8">
            <!-- Success Message -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-4">
                    <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Penerimaan Berhasil!</h1>
                <p class="text-gray-600">Invoice telah diterima dan diproses</p>
            </div>

            <!-- Receipt Info -->
            <div class="mb-8 p-6 bg-green-50 border-2 border-green-200 rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <span class="text-sm text-green-700">Nomor Tiket:</span>
                        <div class="font-bold text-xl text-green-900">{{ $ticket->ticket_number }}</div>
                    </div>
                    <div>
                        <span class="text-sm text-green-700">Diterima Tanggal:</span>
                        <div class="font-semibold text-green-900">{{ $ticket->received_at->format('d/m/Y H:i:s') }}</div>
                    </div>
                    <div>
                        <span class="text-sm text-green-700">Company:</span>
                        <div class="font-semibold text-green-900">{{ $ticket->company->name }}</div>
                    </div>
                    <div>
                        <span class="text-sm text-green-700">Diterima Oleh:</span>
                        <div class="font-semibold text-green-900">{{ $ticket->received_by }}</div>
                    </div>
                </div>
            </div>

            <!-- Invoice List -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Daftar Invoice yang Diterima ({{ $ticket->invoice_count }})</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 border border-gray-200 rounded-lg">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No Invoice</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No Seri F/P</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Currency</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($ticket->invoices as $index => $invoice)
                            <tr>
                                <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $invoice->invoice_number }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $invoice->no_seri_fp }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $invoice->invoice_date->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $invoice->currency }}</td>
                            </tr>
                            @endforeach
                            <tr class="bg-gray-100 font-bold">
                                <td colspan="5" class="px-4 py-3 text-center">
                                    TOTAL: {{ $ticket->invoice_count }} Invoice
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-center space-x-4 pt-6 border-t">
                <a href="{{ route('reception.print-receipt', $ticket) }}" target="_blank" class="px-8 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 flex items-center shadow-lg hover:shadow-xl transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Print Bukti Terima
                </a>
                
                <a href="{{ route('reception.index') }}" class="px-8 py-3 border-2 border-gray-300 rounded-lg text-gray-700 font-semibold hover:bg-gray-50 transition">
                    Kembali ke Reception
                </a>
            </div>

            <!-- Info Box -->
            <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-blue-800">Catatan Penting:</p>
                        <ul class="mt-2 text-sm text-blue-700 list-disc list-inside space-y-1">
                            <li>Silakan print bukti terima untuk arsip supplier</li>
                            <li>Invoice fisik telah diterima dan akan diproses lebih lanjut</li>
                            <li>Status tiket telah diupdate menjadi "Diterima"</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>