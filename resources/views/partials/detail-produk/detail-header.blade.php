<section class="max-w-7xl mx-auto px-6 py-12">

    {{-- Judul Halaman --}}
    <div class="text-center mb-12">

        <h1 class="text-4xl font-bold text-gray-800">

            Detail Produk

        </h1>

        <p class="text-gray-500 mt-3 max-w-2xl mx-auto">

            Lihat informasi lengkap produk serta pilih jenis kayu yang sesuai dengan kebutuhan Anda sebelum melanjutkan ke proses pemesanan.

        </p>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        {{-- Foto Produk --}}
        <div>

            @if($product->gambar)

                <img
                    src="{{ asset('storage/'.$product->gambar) }}"
                    alt="{{ $product->nama_produk }}"
                    class="w-full h-[520px] object-cover rounded-2xl border border-gray-200 shadow-lg">

            @else

                <img
                    src="https://placehold.co/600x400"
                    alt="Tidak ada gambar"
                    class="w-full h-[520px] object-cover rounded-2xl border border-gray-200 shadow-lg">

            @endif

        </div>

        {{-- Informasi Produk --}}
        <div>

            <span class="inline-flex items-center px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-semibold mb-4">

                {{ $product->kategori }}

            </span>

            <h2 class="text-4xl font-bold text-gray-800 mb-5">

                {{ $product->nama_produk }}

            </h2>

            <p class="text-gray-600 leading-8">

                {{ $product->deskripsi }}

            </p>

            {{-- Informasi Produk --}}
            <div class="mt-8 bg-white rounded-2xl border border-gray-200 shadow-md p-6">

                <h3 class="text-lg font-bold text-gray-800 mb-5">

                    Informasi Produk

                </h3>

                <div class="space-y-4">

                    <div class="flex justify-between items-center border-b pb-3">

                        <span class="text-gray-600">

                            Kategori

                        </span>

                        <span class="font-semibold text-gray-800">

                            {{ $product->kategori }}

                        </span>

                    </div>

                    <div class="flex justify-between items-center border-b pb-3">

                        <span class="text-gray-600">

                            Jenis Kayu

                        </span>

                        <span class="inline-flex items-center px-4 py-1 rounded-full bg-blue-100 text-blue-700 font-semibold">

                            {{ $product->jenisKayu->count() }} Jenis Tersedia

                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-gray-600">

                            Status

                        </span>

                        <span class="inline-flex items-center px-4 py-1 rounded-full bg-green-100 text-green-700 font-semibold">

                            Tersedia

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>