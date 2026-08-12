<header class="bg-white shadow-md sticky top-0 z-50 border-b">

    <nav class="max-w-7xl mx-auto flex items-center justify-between px-8 py-4">

        {{-- ====================================================== --}}
        {{-- LOGO --}}
        {{-- ====================================================== --}}

        <a href="/" class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-full overflow-hidden shadow border bg-white">

                @if($setting && $setting->logo)

                    <img
                        src="{{ asset('storage/' . $setting->logo) }}"
                        alt="{{ $setting->nama_perusahaan }}"
                        class="w-full h-full object-cover"
                        onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">

                @else

                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Logo Mekar Mandiri"
                        class="w-full h-full object-cover"
                        onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">

                @endif

                {{-- Logo Default --}}
                <div
                    class="w-full h-full hidden items-center justify-center bg-green-700 text-white text-2xl">

                    🪵

                </div>

            </div>

            {{-- ====================================================== --}}
            {{-- NAMA PERUSAHAAN --}}
            {{-- ====================================================== --}}

            <div>

                <h1 class="text-xl font-bold text-green-700">

                    {{ $setting->nama_perusahaan ?? 'Mekar Mandiri' }}

                </h1>

                <p class="text-xs text-gray-500">

                    {{ $setting->tagline ?? 'Sistem Informasi Penjualan Kayu' }}

                </p>

            </div>

        </a>

        {{-- ====================================================== --}}
        {{-- MENU --}}
        {{-- ====================================================== --}}

        <div class="hidden md:flex items-center gap-10 font-medium">

            <a
                href="/"
                class="{{ ($title ?? '') == 'Beranda'
                    ? 'text-green-700 border-b-2 border-green-700 pb-2 font-semibold'
                    : 'text-gray-700 hover:text-green-700 border-b-2 border-transparent pb-2 transition' }}">

                Beranda

            </a>

            <a
                href="/produk"
                class="{{ ($title ?? '') == 'Produk'
                    ? 'text-green-700 border-b-2 border-green-700 pb-2 font-semibold'
                    : 'text-gray-700 hover:text-green-700 border-b-2 border-transparent pb-2 transition' }}">

                Produk

            </a>

            <a
                href="/tentang-kami"
                class="{{ ($title ?? '') == 'Tentang Kami'
                    ? 'text-green-700 border-b-2 border-green-700 pb-2 font-semibold'
                    : 'text-gray-700 hover:text-green-700 border-b-2 border-transparent pb-2 transition' }}">

                Tentang Kami

            </a>

        </div>

        {{-- ====================================================== --}}
        {{-- AKUN --}}
        {{-- ====================================================== --}}

        @auth

            <div class="relative">

                <button
                    id="akunButton"
                    class="flex items-center gap-3 border rounded-xl px-4 py-2 hover:bg-green-50 transition duration-300">

                    @if(Auth::user()->foto)

                        <img
                            src="{{ asset('storage/' . Auth::user()->foto) }}"
                            alt="Foto Profil"
                            class="w-11 h-11 rounded-full object-cover border-2 border-green-600">

                    @else

                        <div
                            class="w-11 h-11 rounded-full bg-green-100 flex items-center justify-center text-xl">

                            👤

                        </div>

                    @endif

                    <div class="text-left">

                        <h4 class="font-semibold text-gray-800">

                            {{ Auth::user()->name }}

                        </h4>

                        <p class="text-xs text-gray-500">

                            Customer

                        </p>

                    </div>

                    <span id="arrowIcon" class="text-gray-500">

                        ▼

                    </span>

                </button>
                    {{-- =============================== --}}
                {{-- DROPDOWN --}}
                {{-- =============================== --}}

                <div
                    id="akunMenu"
                    class="absolute right-0 mt-3 hidden bg-white rounded-2xl shadow-2xl border w-72 overflow-hidden">

                    {{-- Header Dropdown --}}
                    <div class="p-5 bg-green-700 text-white">

                        <div class="flex items-center gap-4">

                            @if(Auth::user()->foto)

                                <img
                                    src="{{ asset('storage/' . Auth::user()->foto) }}"
                                    class="w-14 h-14 rounded-full object-cover border-2 border-white">

                            @else

                                <div
                                    class="w-14 h-14 rounded-full bg-white text-green-700 flex items-center justify-center text-2xl">

                                    👤

                                </div>

                            @endif

                            <div>

                                <h4 class="font-semibold">

                                    {{ Auth::user()->name }}

                                </h4>

                                <p class="text-sm opacity-90">

                                    {{ Auth::user()->email }}

                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- Menu --}}
                    <a
                        href="{{ route('profil.index') }}"
                        class="flex items-center gap-3 px-5 py-4 hover:bg-gray-100 transition">

                        👤

                        <span>Profil Saya</span>

                    </a>

                    <a
                        href="{{ route('pesanan.index') }}"
                        class="flex items-center gap-3 px-5 py-4 hover:bg-gray-100 transition">

                        📦

                        <span>Pesanan Saya</span>

                    </a>

                    <hr>

                    <form
                        action="{{ route('logout') }}"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="w-full flex items-center gap-3 px-5 py-4 text-red-600 hover:bg-red-50 transition">

                            🚪

                            <span>Logout</span>

                        </button>

                    </form>

                </div>

            </div>

        @else

            <a
                href="{{ route('login') }}"
                class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg transition">

                Login

            </a>

        @endauth

    </nav>

</header>

@auth

<script>
document.addEventListener('DOMContentLoaded', function () {

    const akunButton = document.getElementById('akunButton');
    const akunMenu = document.getElementById('akunMenu');
    const arrowIcon = document.getElementById('arrowIcon');

    if (!akunButton || !akunMenu) return;

    akunButton.addEventListener('click', function (e) {

        e.stopPropagation();

        akunMenu.classList.toggle('hidden');

        arrowIcon.textContent = akunMenu.classList.contains('hidden')
            ? '▼'
            : '▲';

    });

    document.addEventListener('click', function (e) {

        if (
            !akunButton.contains(e.target) &&
            !akunMenu.contains(e.target)
        ) {
            akunMenu.classList.add('hidden');
            arrowIcon.textContent = '▼';
        }

    });

});
</script>

@endauth