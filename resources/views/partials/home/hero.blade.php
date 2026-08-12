<section class="max-w-7xl mx-auto px-6 py-16">

    <div class="grid md:grid-cols-2 gap-10 items-center">

        {{-- ====================================================== --}}
        {{-- HERO CONTENT --}}
        {{-- ====================================================== --}}

        <div>

            <h1 class="text-5xl font-bold">

                {{ $setting->hero_judul }}

            </h1>

            <p class="mt-6 text-gray-600 leading-8">

                {{ $setting->hero_deskripsi }}

            </p>

            <a
                href="/produk"
                class="inline-block mt-8 bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition">

                Lihat Produk

            </a>

        </div>

        {{-- ====================================================== --}}
        {{-- HERO IMAGE --}}
        {{-- ====================================================== --}}

        <div>

            @if($setting->hero_banner)

                <img
                    src="{{ asset('storage/' . $setting->hero_banner) }}"
                    alt="{{ $setting->nama_perusahaan }}"
                    class="rounded-xl shadow-lg w-full h-auto object-cover">

            @else

                <img
                    src="https://placehold.co/600x400?text=Banner+Mekar+Mandiri"
                    alt="Banner"
                    class="rounded-xl shadow-lg w-full h-auto object-cover">

            @endif

        </div>

    </div>

</section>