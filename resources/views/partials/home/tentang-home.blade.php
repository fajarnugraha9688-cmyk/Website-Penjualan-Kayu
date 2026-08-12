<section class="max-w-7xl mx-auto px-6 py-16">

    <div class="grid md:grid-cols-2 gap-10 items-center">

        {{-- ====================================================== --}}
        {{-- FOTO TENTANG --}}
        {{-- ====================================================== --}}

        <div>

            @if($setting->foto_tentang)

                <img
                    src="{{ asset('storage/' . $setting->foto_tentang) }}"
                    alt="{{ $setting->nama_perusahaan }}"
                    class="rounded-xl shadow-lg w-full h-auto object-cover">

            @else

                <img
                    src="https://placehold.co/600x400?text=Tentang+Kami"
                    alt="Tentang Kami"
                    class="rounded-xl shadow-lg w-full h-auto object-cover">

            @endif

        </div>

        {{-- ====================================================== --}}
        {{-- ISI --}}
        {{-- ====================================================== --}}

        <div>

            <h2 class="text-3xl font-bold mb-5">

                {{ $setting->tentang_judul }}

            </h2>

            <p class="text-gray-600 leading-8">

                {{ \Illuminate\Support\Str::limit($setting->tentang_deskripsi, 300) }}

            </p>

            <a
                href="/tentang-kami"
                class="inline-block mt-8 bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition">

                Selengkapnya

            </a>

        </div>

    </div>

</section>