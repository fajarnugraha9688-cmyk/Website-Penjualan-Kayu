<section class="max-w-7xl mx-auto px-6 py-16">

    <h2 class="text-3xl font-bold text-center mb-3">

        Produk Unggulan

    </h2>

    <p class="text-center text-gray-600 mb-10">

        Beberapa produk unggulan pilihan dari Mekar Mandiri.

    </p>

    @if($produkUnggulan->count())

    <div class="grid md:grid-cols-3 gap-8">

        @foreach($produkUnggulan as $produk)

        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">

            @if($produk->gambar)

                <img
                    src="{{ asset('storage/'.$produk->gambar) }}"
                    alt="{{ $produk->nama_produk }}"
                    class="w-full h-64 object-cover">

            @else

                <img
                    src="https://placehold.co/600x400?text=Produk"
                    class="w-full h-64 object-cover">

            @endif

            <div class="p-6">

                <h3 class="text-2xl font-bold text-gray-800">

                    {{ $produk->nama_produk }}

                </h3>

                <p class="text-gray-600 mt-4 leading-7">

                    {{ \Illuminate\Support\Str::limit($produk->deskripsi,120) }}

                </p>

                <a
                    href="{{ url('/produk/'.$produk->id) }}"
                    class="inline-block mt-6 bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg transition">

                    Detail Produk

                </a>

            </div>

        </div>

        @endforeach

    </div>

    @else

        <div class="bg-yellow-50 border border-yellow-300 rounded-xl p-10 text-center">

            <h2 class="text-2xl font-bold text-yellow-700">

                Belum Ada Produk Unggulan

            </h2>

            <p class="mt-3 text-gray-600">

                Admin belum menentukan produk unggulan.

            </p>

        </div>

    @endif

</section>