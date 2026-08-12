{{-- ======================================================
INFORMASI PEMBAYARAN
====================================================== --}}

<div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-8">

    {{-- Header --}}
    <div class="bg-green-700 px-8 py-5">

        <h2 class="text-2xl font-bold text-white">

            Informasi Pembayaran

        </h2>

        <p class="text-green-100 text-sm mt-1">

            Lakukan pembayaran melalui rekening berikut sesuai dengan total pesanan Anda.

        </p>

    </div>

    <div class="p-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Bank --}}
            <div class="rounded-xl border border-gray-200 bg-gray-50 p-5">

                <p class="text-sm text-gray-500">

                    Bank

                </p>

                <h3 class="mt-2 text-xl font-bold text-gray-800">

                    {{ $setting->nama_bank }}

                </h3>

            </div>

            {{-- Nomor Rekening --}}
            <div class="rounded-xl border border-green-200 bg-green-50 p-5">

                <p class="text-sm text-gray-500">

                    Nomor Rekening

                </p>

                <h3 class="mt-2 text-2xl font-bold tracking-wide text-green-700">

                    {{ $setting->nomor_rekening }}

                </h3>

            </div>

            {{-- Atas Nama --}}
            <div class="rounded-xl border border-gray-200 bg-gray-50 p-5">

                <p class="text-sm text-gray-500">

                    Atas Nama

                </p>

                <h3 class="mt-2 text-xl font-bold text-gray-800">

                    {{ $setting->atas_nama }}

                </h3>

            </div>

        </div>

        {{-- Informasi Transfer --}}
        <div class="mt-8 rounded-xl border border-green-200 bg-green-50 p-5">

            <h4 class="font-semibold text-green-700 mb-2">

                Informasi Transfer

            </h4>

            <p class="text-sm text-gray-700 leading-7">

                Lakukan pembayaran sesuai dengan <strong>Grand Total</strong> sebesar

                <strong class="text-green-700">

                    Rp {{ number_format($grandTotal,0,',','.') }}

                </strong>

                menggunakan rekening di atas. Setelah transfer selesai, silakan unggah bukti pembayaran agar pesanan dapat segera diverifikasi oleh admin.

            </p>

        </div>

    </div>

</div>