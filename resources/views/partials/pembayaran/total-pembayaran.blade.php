{{-- ======================================================
TOTAL PEMBAYARAN
====================================================== --}}

<div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-8">

    {{-- Header --}}
    <div class="bg-green-700 px-8 py-5">

        <h2 class="text-2xl font-bold text-white">

            Total Pembayaran

        </h2>

        <p class="text-green-100 text-sm mt-1">

            Total pembayaran yang harus ditransfer sesuai dengan pesanan Anda.

        </p>

    </div>

    <div class="p-8">

        {{-- Total Jenis Produk --}}
        <div class="flex justify-between items-center py-4 border-b">

            <div>

                <p class="text-gray-500 text-sm">

                    Total Jenis Produk

                </p>

                <h3 class="font-semibold text-gray-800">

                    Produk yang dipilih

                </h3>

            </div>

            <span class="inline-flex items-center justify-center bg-gray-100 text-gray-700 font-bold rounded-full px-5 py-2">

                {{ $jenisKayu->count() }} Produk

            </span>

        </div>

        {{-- Total Item --}}
        <div class="flex justify-between items-center py-4 border-b">

            <div>

                <p class="text-gray-500 text-sm">

                    Total Item

                </p>

                <h3 class="font-semibold text-gray-800">

                    Jumlah keseluruhan pesanan

                </h3>

            </div>

            <span class="inline-flex items-center justify-center bg-gray-100 text-gray-700 font-bold rounded-full px-5 py-2">

                {{ array_sum($checkout['jumlah']) }}

            </span>

        </div>

        {{-- Grand Total --}}
        <div class="flex justify-between items-center pt-6">

            <div>

                <p class="text-gray-500 text-sm">

                    Grand Total

                </p>

                <h2 class="text-2xl font-bold text-gray-800">

                    Total Pembayaran

                </h2>

            </div>

            <div>

                <span class="text-4xl font-extrabold text-green-700">

                    Rp {{ number_format($grandTotal,0,',','.') }}

                </span>

            </div>

        </div>

        {{-- Informasi --}}
        <div class="mt-8 rounded-xl border border-green-200 bg-green-50 p-5">

            <h4 class="font-semibold text-green-700 mb-2">

                Informasi

            </h4>

            <p class="text-sm text-gray-600 leading-7">

                Pastikan nominal transfer sesuai dengan <strong>Grand Total</strong>. Pembayaran dengan nominal yang berbeda dapat memperlambat proses verifikasi oleh admin.

            </p>

        </div>

    </div>

</div>