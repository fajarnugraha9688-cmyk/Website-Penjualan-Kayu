<section class="max-w-7xl mx-auto px-6 py-16">

    {{-- ========================================================= --}}
    {{-- JUDUL --}}
    {{-- ========================================================= --}}

    <h1 class="text-4xl font-bold text-center">

        Produk Kami

    </h1>

    <p class="text-center text-gray-600 mt-4 mb-12">

        Kami menyediakan berbagai produk kayu berkualitas
        untuk kebutuhan konstruksi maupun furniture.

    </p>

    {{-- ========================================================= --}}
    {{-- LIST PRODUK --}}
    {{-- ========================================================= --}}

    <div class="grid md:grid-cols-3 gap-8">

        @forelse($products as $product)

        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">

            {{-- FOTO --}}
            @if($product->gambar)

                <img
                    src="{{ asset('storage/'.$product->gambar) }}"
                    alt="{{ $product->nama_produk }}"
                    class="w-full h-56 object-cover">

            @else

                <img
                    src="https://placehold.co/500x350"
                    class="w-full h-56 object-cover">

            @endif

            <div class="p-6">

                {{-- Nama --}}
                <h3 class="text-2xl font-bold text-gray-800">

                    {{ $product->nama_produk }}

                </h3>

                {{-- Kategori --}}
                <p class="text-green-700 font-medium mt-2">

                    Kategori :
                    {{ $product->kategori }}

                </p>

                {{-- Jumlah Jenis --}}
                <div class="mt-3">

                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                        {{ $product->jenis_kayu_count }}
                        Jenis Kayu

                    </span>

                </div>

                {{-- Deskripsi --}}
                <p class="text-gray-600 mt-4 leading-relaxed">

                    {{ Str::limit($product->deskripsi,100) }}

                </p>

                {{-- Tombol --}}
                <a
                    href="{{ url('/produk/'.$product->id) }}"
                    class="inline-block mt-6 bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                    Lihat Detail

                </a>

            </div>

        </div>

        @empty

        <div class="col-span-3 text-center py-12">

            <h3 class="text-2xl font-semibold text-gray-500">

                Produk belum tersedia.

            </h3>

        </div>

        @endforelse

    </div>

</section>