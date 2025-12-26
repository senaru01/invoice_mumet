<x-reception-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-12 w-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <p class="text-sm font-medium text-gray-600">Tiket Hari Ini</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $stats['today_tickets'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-emerald-500">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-12 w-12 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <p class="text-sm font-medium text-gray-600">Sudah Diterima</p>
                        <p class="text-3xl font-bold text-emerald-600">{{ $stats['today_received'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-12 w-12 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5">
                        <p class="text-sm font-medium text-gray-600">Pending</p>
                        <p class="text-3xl font-bold text-yellow-600">{{ $stats['today_pending'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scan Form -->
        <div class="bg-white rounded-lg shadow-lg p-8 border border-gray-200">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Scan QR Code Tiket</h2>
                <p class="text-gray-600">Scan QR code atau masukkan nomor tiket secara manual</p>
            </div>

            <form action="{{ route('reception.scan') }}" method="POST" id="scanForm">
                @csrf
                <div class="mb-6">
                    <label for="ticket_number" class="block text-lg font-semibold text-gray-800 mb-3">
                        Nomor Tiket
                    </label>
                    <input type="text" 
                           name="ticket_number" 
                           id="ticket_number" 
                           autofocus 
                           autocomplete="off"
                           placeholder="Contoh: TKT-20231201-0001" 
                           class="w-full text-center text-2xl font-mono px-4 py-4 border-2 border-gray-300 rounded-lg focus:ring-4 focus:ring-emerald-500 focus:border-emerald-500 shadow-sm"
                           required>
                    <p class="mt-2 text-sm text-gray-600 text-center">
                        Format: TKT-YYYYMMDD-XXXX (18 karakter)
                    </p>
                </div>

                <button type="submit" 
                        class="w-full bg-emerald-600 text-white py-4 px-6 rounded-lg text-xl font-bold hover:bg-emerald-700 shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <svg class="inline-block w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    Proses Tiket
                </button>
            </form>

            <!-- Instructions -->
            <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <h4 class="font-semibold text-blue-900 mb-2">📋 Petunjuk Penggunaan:</h4>
                <ol class="list-decimal list-inside text-sm text-blue-800 space-y-1">
                    <li>Arahkan scanner barcode ke QR Code pada tiket</li>
                    <li>Nomor tiket akan otomatis terisi</li>
                    <li>Atau ketik manual nomor tiket (18 karakter)</li>
                    <li>Klik "Proses Tiket" atau tekan Enter</li>
                    <li>Periksa detail invoice dan konfirmasi penerimaan</li>
                </ol>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const ticketInput = document.getElementById('ticket_number');
        const form = document.getElementById('scanForm');
        
        ticketInput.addEventListener('input', function(e) {
            const value = e.target.value.trim();
            if (value.length === 18 && value.startsWith('TKT-')) {
                setTimeout(function() {
                    form.submit();
                }, 300);
            }
        });

        window.addEventListener('load', function() {
            ticketInput.focus();
        });

        setInterval(function() {
            if (document.activeElement !== ticketInput) {
                ticketInput.focus();
            }
        }, 3000);
    </script>
    @endpush
</x-reception-layout>