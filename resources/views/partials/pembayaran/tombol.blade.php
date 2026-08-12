{{-- ======================================================
TOMBOL
====================================================== --}}

<div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 mt-10">

    <div class="border-t border-gray-200 pt-6">

        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">

            {{-- Tombol Kembali --}}
            <a
                href="{{ route('pemesanan') }}"
                class="w-full sm:w-auto inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-8 py-3 rounded-xl transition duration-300">

                ← Kembali

            </a>

            {{-- Tombol Konfirmasi --}}
            <button
                type="submit"
                class="w-full sm:w-auto inline-flex items-center justify-center bg-green-700 hover:bg-green-800 text-white font-semibold px-10 py-3 rounded-xl shadow-md transition duration-300">

                Konfirmasi Pesanan →

            </button>

        </div>

        <p class="text-sm text-gray-500 text-center mt-6">

            Dengan menekan tombol <strong>Konfirmasi Pesanan</strong>, Anda menyatakan bahwa data pesanan dan bukti pembayaran yang diunggah sudah benar.

        </p>

    </div>

</div>