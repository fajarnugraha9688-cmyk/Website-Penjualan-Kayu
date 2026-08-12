{{-- ======================================================
RINGKASAN PESANAN
====================================================== --}}

<div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-8">

    {{-- Header --}}
    <div class="bg-green-700 px-8 py-5">

        <h2 class="text-2xl font-bold text-white">

            Ringkasan Pesanan

        </h2>

        <p class="text-green-100 text-sm mt-1">

            Periksa kembali produk yang akan dibeli sebelum melakukan pembayaran.

        </p>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

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

                @foreach($jenisKayu as $item)

                @php

                    $jumlah = $checkout['jumlah'][$item->id];
                    $subtotal = $jumlah * $item->harga;

                @endphp

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

                    </td>

                    {{-- Harga --}}
                    <td class="text-center">

                        <span class="inline-flex items-center justify-center bg-green-100 text-green-700 font-bold rounded-full px-5 py-2">

                            Rp {{ number_format($item->harga,0,',','.') }}

                        </span>

                    </td>

                    {{-- Jumlah --}}
                    <td class="text-center">

                        <span class="inline-flex items-center justify-center bg-gray-100 text-gray-700 rounded-full px-4 py-2 font-semibold">

                            {{ number_format($jumlah) }}
                            {{ $item->satuan }}

                        </span>

                    </td>

                    {{-- Subtotal --}}
                    <td class="text-center">

                        <span class="inline-flex items-center justify-center bg-green-100 text-green-700 font-bold rounded-full px-6 py-2">

                            Rp {{ number_format($subtotal,0,',','.') }}

                        </span>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>