<section class="max-w-7xl mx-auto px-6 py-14">

    {{-- ====================================================== --}}
    {{-- JUDUL --}}
    {{-- ====================================================== --}}

    <div class="text-center mb-12">

        <h1 class="text-5xl font-bold text-gray-900">

            Pemesanan Produk

        </h1>

        <p class="text-gray-500 mt-3 text-lg">

            Lengkapi jumlah produk dan data pemesan sebelum melanjutkan ke proses pembayaran.

        </p>

    </div>

    {{-- ====================================================== --}}
    {{-- RINGKASAN PRODUK --}}
    {{-- ====================================================== --}}

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-10 border">

        <div class="bg-green-700 text-white px-8 py-5">

            <h2 class="text-2xl font-bold">

                📦 Ringkasan Produk

            </h2>

            <p class="text-green-100 mt-1">

                Pastikan produk dan jumlah pesanan sudah sesuai.

            </p>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr class="text-gray-700">

                        <th class="py-4 px-4 text-center w-20">
                            No
                        </th>

                        <th class="py-4 px-5 text-left">
                            Jenis Kayu
                        </th>

                        <th class="py-4 px-5 text-center">
                            Ukuran
                        </th>

                        <th class="py-4 px-5 text-center">
                            Harga
                        </th>

                        <th class="py-4 px-5 text-center">
                            Jumlah
                        </th>

                        <th class="py-4 px-5 text-center">
                            Subtotal
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <tr class="border-t hover:bg-green-50 transition">

                        <td class="text-center font-semibold">

                            1

                        </td>

                        <td class="py-5 px-5">

                            <h3 class="font-bold text-gray-800">

                                🪵 Balok

                            </h3>

                            <p class="text-sm text-gray-500 mt-1">

                                Kayu Berkualitas

                            </p>

                        </td>

                        <td class="text-center text-gray-600">

                            5 x 10 x 400 cm

                        </td>

                        <td class="text-center font-bold text-green-700">

                            Rp300.000

                        </td>

                        <td class="text-center">

                            <input
                                type="number"
                                value="2"
                                min="1"
                                class="w-24 text-center border-2 rounded-xl py-2 focus:ring-2 focus:ring-green-600 focus:border-green-600">

                            <p class="text-xs text-gray-500 mt-2">

                                Stok tersedia :
                                <strong>

                                    250 Batang

                                </strong>

                            </p>

                        </td>

                        <td class="text-center">

                            <span class="bg-green-100 text-green-700 font-bold px-5 py-2 rounded-full">

                                Rp600.000

                            </span>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    {{-- ====================================================== --}}
    {{-- RINGKASAN PEMBAYARAN --}}
    {{-- ====================================================== --}}

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-10 border">

        <div class="bg-green-700 text-white px-8 py-5">

            <h2 class="text-2xl font-bold">

                💰 Ringkasan Pembayaran

            </h2>

            <p class="text-green-100 mt-1">

                Total pembayaran akan dihitung secara otomatis.

            </p>

        </div>

        <div class="p-8">

            <div class="flex justify-between border-b pb-4 mb-4">

                <span class="text-gray-600">

                    Total Jenis Produk

                </span>

                <strong>

                    2 Produk

                </strong>

            </div>

            <div class="flex justify-between border-b pb-4 mb-6">

                <span class="text-gray-600">

                    Total Item

                </span>

                <strong>

                    5

                </strong>

            </div>

            <div class="flex justify-between items-center">

                <span class="text-3xl font-bold">

                    Grand Total

                </span>

                <span class="text-4xl font-bold text-green-700">

                    Rp1.350.000

                </span>

            </div>

        </div>

    </div>

        {{-- ====================================================== --}}
    {{-- DATA PEMESAN --}}
    {{-- ====================================================== --}}

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-10 border">

        <div class="bg-green-700 text-white px-8 py-5">

            <h2 class="text-2xl font-bold">

                👤 Data Pemesan

            </h2>

            <p class="text-green-100 mt-1">

                Lengkapi informasi pemesan agar proses pengiriman berjalan dengan lancar.

            </p>

        </div>

        <div class="p-8">

            <div class="grid md:grid-cols-2 gap-6">

                {{-- Nama --}}
                <div>

                    <label class="font-semibold text-gray-700">

                        Nama Lengkap

                    </label>

                    <input
                        type="text"
                        class="w-full mt-2 border-2 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-600 focus:border-green-600"
                        placeholder="Masukkan nama lengkap">

                </div>

                {{-- HP --}}
                <div>

                    <label class="font-semibold text-gray-700">

                        Nomor HP / WhatsApp

                    </label>

                    <input
                        type="text"
                        class="w-full mt-2 border-2 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-600 focus:border-green-600"
                        placeholder="08xxxxxxxxxx">

                </div>

            </div>

            {{-- Alamat --}}
            <div class="mt-6">

                <label class="font-semibold text-gray-700">

                    Alamat Pengiriman

                </label>

                <textarea
                    rows="4"
                    class="w-full mt-2 border-2 rounded-xl px-4 py-3 resize-none focus:ring-2 focus:ring-green-600 focus:border-green-600"
                    placeholder="Masukkan alamat lengkap pengiriman"></textarea>

            </div>

            {{-- Catatan --}}
            <div class="mt-6">

                <label class="font-semibold text-gray-700">

                    Catatan Tambahan <span class="text-gray-400">(Opsional)</span>

                </label>

                <textarea
                    rows="3"
                    class="w-full mt-2 border-2 rounded-xl px-4 py-3 resize-none focus:ring-2 focus:ring-green-600 focus:border-green-600"
                    placeholder="Contoh: Tolong kirim pada jam kerja atau permintaan khusus lainnya."></textarea>

            </div>

        </div>

    </div>

    {{-- ====================================================== --}}
    {{-- INFORMASI --}}
    {{-- ====================================================== --}}

    <div class="bg-amber-50 border-l-4 border-amber-500 rounded-xl p-8 mb-10">

        <h3 class="font-bold text-xl text-amber-700 mb-4">

            ⚠️ Perhatian Sebelum Melanjutkan

        </h3>

        <ul class="space-y-3 text-gray-700 leading-7 list-disc pl-6">

            <li>
                Pastikan jumlah produk sudah sesuai dengan kebutuhan Anda.
            </li>

            <li>
                Pastikan nama, nomor HP, dan alamat pengiriman telah diisi dengan benar.
            </li>

            <li>
                Setelah melanjutkan, Anda akan diarahkan ke halaman pembayaran.
            </li>

            <li>
                Upload bukti transfer yang jelas agar pesanan dapat segera diverifikasi.
            </li>

        </ul>

    </div>

    {{-- ====================================================== --}}
    {{-- TOMBOL --}}
    {{-- ====================================================== --}}

    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-10">

        <a
            href="{{ url()->previous() }}"
            class="w-full md:w-auto bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-3 rounded-xl transition font-semibold">

            ← Kembali

        </a>

        <button
            type="submit"
            class="w-full md:w-auto bg-green-700 hover:bg-green-800 text-white px-10 py-3 rounded-xl shadow-lg transition font-semibold">

            Lanjut ke Pembayaran →

        </button>

    </div>

</section>

</section>