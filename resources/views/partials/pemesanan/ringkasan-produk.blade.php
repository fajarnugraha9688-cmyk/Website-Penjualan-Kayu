{{-- ====================================================== --}}
{{-- RINGKASAN PRODUK --}}
{{-- ====================================================== --}}

<div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-8">

    {{-- Header --}}
    <div class="bg-green-700 px-8 py-5">

        <h2 class="text-2xl font-bold text-white">

            Ringkasan Produk

        </h2>

        <p class="text-green-100 text-sm mt-1">

            Periksa kembali produk yang akan dipesan sebelum melanjutkan ke proses pembayaran.

        </p>

    </div>

    <div class="overflow-x-auto">

      <table id="tabelProduk" class="w-full">

            <thead class="bg-gray-50 border-b">

                <tr class="text-gray-700">

                    <th class="px-6 py-4 text-left">
                        Jenis Kayu
                    </th>

                    <th class="px-6 py-4 text-center">
                        Harga
                    </th>

                    <th class="px-6 py-4 text-center">
                        Jumlah
                    </th>

                    <th class="px-6 py-4 text-center">
                        Subtotal
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($jenisKayu as $item)

                <tr class="border-b hover:bg-green-50 transition duration-300">

                    {{-- Jenis Kayu --}}
                    <td class="px-6 py-6">

                        <h3 class="text-lg font-semibold text-gray-800">

                            {{ $item->jenis }}

                        </h3>

                        <p class="text-sm text-gray-500 mt-1">

                            Ukuran :
                            <span class="font-medium">

                                {{ $item->ukuran }}

                            </span>

                        </p>

                        <input
                            type="hidden"
                            name="jenis_kayu[]"
                            value="{{ $item->id }}">

                    </td>

                    {{-- Harga --}}
                    <td
                        class="harga text-center"
                        data-harga="{{ $item->harga }}">

                        <span class="inline-flex items-center justify-center bg-green-100 text-green-700 font-bold rounded-full px-5 py-2">

                            Rp {{ number_format($item->harga,0,',','.') }}

                        </span>

                    </td>

                    {{-- Jumlah --}}
                    <td class="text-center px-6 py-6">

                        <input
                            type="number"
                            name="jumlah[{{ $item->id }}]"
                            value="1"
                            min="1"
                            max="{{ $item->stok }}"
                            data-stok="{{ $item->stok }}"
                            class="jumlah w-24 text-center border-2 border-gray-300 rounded-xl py-2 font-semibold focus:border-green-600 focus:ring-2 focus:ring-green-600">

                        <div class="mt-3">

                            <span class="inline-flex items-center bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">

                                Stok :

                                <strong class="mx-1">

                                    {{ number_format($item->stok) }}

                                </strong>

                                {{ $item->satuan }}

                            </span>

                        </div>

                        <p class="stok-warning hidden text-red-600 text-xs mt-2">

                            Jumlah melebihi stok yang tersedia.

                        </p>

                    </td>

                    {{-- Subtotal --}}
                    <td class="text-center px-6 py-6">

                        <span class="subtotal inline-flex items-center justify-center bg-green-100 text-green-700 font-bold rounded-full px-6 py-2">

                            Rp {{ number_format($item->harga,0,',','.') }}

                        </span>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="py-12 text-center text-gray-500">

                        Belum ada produk yang dipilih.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>