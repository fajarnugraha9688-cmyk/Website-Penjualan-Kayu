{{-- =========================================
TOMBOL AKSI
========================================= --}}

<div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6">

    <div class="flex flex-col md:flex-row justify-between items-center gap-4">

        {{-- Tombol Kembali --}}
        <a
            href="{{ url('/produk/'.$productId) }}"
            class="w-full md:w-auto inline-flex items-center justify-center px-8 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-semibold transition duration-300">

            ← Kembali

        </a>

        {{-- Tombol Lanjut --}}
        <button
            type="submit"
            class="w-full md:w-auto inline-flex items-center justify-center px-10 py-3 bg-green-700 hover:bg-green-800 text-white rounded-xl font-semibold shadow-lg transition duration-300">

            Lanjut ke Pembayaran →

        </button>

    </div>

    <div class="mt-5 pt-5 border-t border-gray-200">

        <p class="text-center text-sm text-gray-500 leading-6">

            Setelah menekan <strong>Lanjut ke Pembayaran</strong>,
            sistem akan memeriksa status login Anda. Jika belum login,
            Anda akan diarahkan ke halaman Login terlebih dahulu.

        </p>

    </div>

</div>