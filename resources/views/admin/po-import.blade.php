<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Import Purchase Order
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.purchase-orders.process-import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">File PO Excel</label>
                            <input type="file" name="po_file" accept=".xlsx,.xls" required 
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <p class="mt-1 text-sm text-gray-500">Format: xlsx atau xls</p>
                            @error('po_file')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                            <h3 class="font-semibold text-blue-800 mb-2">✨ Fitur Baru - Auto Supplier Detection!</h3>
                            <ul class="list-disc list-inside text-sm text-blue-700 space-y-1">
                                <li>Tidak perlu pilih supplier secara manual</li>
                                <li>Supplier otomatis terdeteksi dari kolom "Supplier Name" di Excel</li>
                                <li>Jika supplier belum ada, sistem akan otomatis membuatnya</li>
                                <li>Bisa import multiple supplier dalam 1 file sekaligus!</li>
                            </ul>
                        </div>

                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                            <h3 class="font-semibold text-yellow-800 mb-2">Catatan:</h3>
                            <ul class="list-disc list-inside text-sm text-yellow-700 space-y-1">
                                <li>PO yang sudah ada akan di-skip (tidak akan duplikat)</li>
                                <li>Satu file bisa berisi multiple PO dan multiple supplier</li>
                                <li>Sistem akan otomatis menghitung PPN (11%) dan PPh23 (2%)</li>
                                <li>Pastikan format tanggal sudah benar</li>
                                <li><strong>PENTING: Kolom "Supplier Name" harus diisi!</strong></li>
                            </ul>
                        </div>

                        <div class="flex gap-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                                Import PO
                            </button>
                            <a href="{{ route('admin.purchase-orders.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-2 rounded-lg">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sample Template -->
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="font-semibold text-lg mb-4">📋 Format Excel (UPDATED):</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-xs border">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-2 py-2">PO NO</th>
                                    <th class="border px-2 py-2">Tgl PO</th>
                                    <th class="border px-2 py-2">Part_Name</th>
                                    <th class="border px-2 py-2">Spesifikasi</th>
                                    <th class="border px-2 py-2">Qty</th>
                                    <th class="border px-2 py-2">Satuan</th>
                                    <th class="border px-2 py-2">Harga</th>
                                    <th class="border px-2 py-2">Total</th>
                                    <th class="border px-2 py-2 bg-green-100">
                                        <span class="text-green-800 font-bold">Supplier Name</span>
                                        <div class="text-[10px] font-normal text-green-600">⭐ KOLOM BARU</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border px-2 py-2">0253-C/STEP/XI/25</td>
                                    <td class="border px-2 py-2">10/11/2025</td>
                                    <td class="border px-2 py-2">CHUCK ASSY</td>
                                    <td class="border px-2 py-2">TB10818-0</td>
                                    <td class="border px-2 py-2">2</td>
                                    <td class="border px-2 py-2">PCS</td>
                                    <td class="border px-2 py-2">742000</td>
                                    <td class="border px-2 py-2">1484000</td>
                                    <td class="border px-2 py-2 bg-green-50 font-semibold">PT Supplier A</td>
                                </tr>
                                <tr>
                                    <td class="border px-2 py-2">0253-C/STEP/XI/25</td>
                                    <td class="border px-2 py-2">10/11/2025</td>
                                    <td class="border px-2 py-2">NITTO BEARING</td>
                                    <td class="border px-2 py-2">TQ15873-0</td>
                                    <td class="border px-2 py-2">5</td>
                                    <td class="border px-2 py-2">PCS</td>
                                    <td class="border px-2 py-2">240800</td>
                                    <td class="border px-2 py-2">1204000</td>
                                    <td class="border px-2 py-2 bg-green-50 font-semibold">PT Supplier A</td>
                                </tr>
                                <tr class="bg-blue-50">
                                    <td class="border px-2 py-2">0341-C/STEP/XI/25</td>
                                    <td class="border px-2 py-2">12/11/2025</td>
                                    <td class="border px-2 py-2">PROGHRESIVE 200T</td>
                                    <td class="border px-2 py-2">51451-KK020</td>
                                    <td class="border px-2 py-2">1</td>
                                    <td class="border px-2 py-2">PCS</td>
                                    <td class="border px-2 py-2">320000000</td>
                                    <td class="border px-2 py-2">320000000</td>
                                    <td class="border px-2 py-2 bg-green-50 font-semibold">PT Supplier B</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4 p-3 bg-green-50 border border-green-200 rounded">
                        <p class="text-sm text-green-800">
                            <strong>💡 Tips:</strong> PO dengan nomor sama akan dikelompokkan otomatis. 
                            PO berbeda bisa dari supplier berbeda dalam 1 file Excel!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>