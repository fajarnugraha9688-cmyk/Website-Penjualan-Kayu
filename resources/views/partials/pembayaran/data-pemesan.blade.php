{{-- ======================================================
DATA PEMESAN
====================================================== --}}

<div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-8">

    {{-- Header --}}
    <div class="bg-green-700 px-8 py-5">

        <h2 class="text-2xl font-bold text-white">

            Data Pemesan

        </h2>

        <p class="text-green-100 text-sm mt-1">

            Informasi pemesan yang akan digunakan untuk proses konfirmasi dan pengiriman.

        </p>

    </div>

    <div class="p-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Nama --}}
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">

                    Nama Lengkap

                </label>

                <div
                    class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 text-gray-800 font-medium">

                    {{ $checkout['nama'] }}

                </div>

            </div>

            {{-- Nomor HP --}}
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">

                    Nomor HP / WhatsApp

                </label>

                <div
                    class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 text-gray-800 font-medium">

                    {{ $checkout['no_hp'] }}

                </div>

            </div>

        </div>

        {{-- Alamat --}}
        <div class="mt-6">

            <label class="block text-sm font-semibold text-gray-700 mb-2">

                Alamat Pengiriman

            </label>

            <div
                class="rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 min-h-[110px] whitespace-pre-line text-gray-800 leading-7">

                {{ $checkout['alamat'] }}

            </div>

        </div>

        {{-- Catatan --}}
        <div class="mt-6">

            <label class="block text-sm font-semibold text-gray-700 mb-2">

                Catatan Tambahan

                <span class="text-gray-400 font-normal">

                    (Opsional)

                </span>

            </label>

            <div
                class="rounded-xl border-2 border-gray-200 bg-gray-50 px-4 py-3 min-h-[90px] whitespace-pre-line text-gray-800 leading-7">

                {{ $checkout['catatan'] ?: 'Tidak ada catatan tambahan.' }}

            </div>

        </div>

        {{-- Informasi --}}
        <div class="mt-8 rounded-xl border border-blue-200 bg-blue-50 p-4">

            <p class="text-sm text-blue-700 leading-6">

                Data pemesan diambil dari informasi yang telah Anda isi pada halaman sebelumnya. Pastikan seluruh data sudah benar sebelum melanjutkan proses pembayaran.

            </p>

        </div>

    </div>

</div>