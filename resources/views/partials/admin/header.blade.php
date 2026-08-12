<header class="bg-white border-b shadow-sm">

    <div class="flex justify-between items-center px-8 py-4">

        {{-- ====================================================== --}}
        {{-- LOGO PERUSAHAAN --}}
        {{-- ====================================================== --}}

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-full overflow-hidden border shadow bg-white">

                @if($setting->logo)

                    <img
                        src="{{ asset('storage/' . $setting->logo) }}"
                        alt="Logo Perusahaan"
                        class="w-full h-full object-cover">

                @else

                    <div class="w-full h-full bg-green-700 flex items-center justify-center">

                        <span class="text-white text-2xl">

                            🌳

                        </span>

                    </div>

                @endif

            </div>

            <div>

                <h1 class="text-2xl font-bold text-gray-800">

                    {{ $setting->nama_perusahaan }}

                </h1>

                <p class="text-gray-500 text-sm">

                    {{ $setting->tagline }}

                </p>

            </div>

        </div>

        {{-- ====================================================== --}}
{{-- ADMIN --}}
{{-- ====================================================== --}}

<div class="relative">

    <button
        id="adminButton"
        class="flex items-center gap-3 border rounded-xl px-5 py-2 hover:bg-green-50 transition">

        {{-- FOTO ADMIN --}}
        @if(Auth::user()->foto)

            <img
                src="{{ asset('storage/' . Auth::user()->foto) }}"
                alt="Foto Admin"
                class="w-10 h-10 rounded-full object-cover border-2 border-green-600">

        @else

            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center">

                👤

            </div>

        @endif

        {{-- NAMA ADMIN --}}
        <div class="text-left">

            <p class="font-semibold">

                {{ Auth::user()->name }}

            </p>

            <small class="text-gray-500">

                Administrator

            </small>

        </div>

        {{-- ICON PANAH --}}
        <span
            id="adminArrow"
            class="text-gray-500">

            ▼

        </span>

    </button>

    {{-- ====================================================== --}}
    {{-- DROPDOWN --}}
    {{-- ====================================================== --}}

    <div
        id="adminMenu"
        class="absolute right-0 mt-3 hidden bg-white rounded-2xl shadow-xl border w-64 overflow-hidden">

        {{-- Header --}}
        <div class="bg-green-700 text-white p-5">

            <div class="flex items-center gap-3">

                @if(Auth::user()->foto)

                    <img
                        src="{{ asset('storage/' . Auth::user()->foto) }}"
                        class="w-12 h-12 rounded-full object-cover border-2 border-white">

                @else

                    <div class="w-12 h-12 rounded-full bg-white text-green-700 flex items-center justify-center text-xl">

                        👤

                    </div>

                @endif

                <div>

                    <p class="font-semibold">

                        {{ Auth::user()->name }}

                    </p>

                    <small>

                        Administrator

                    </small>

                </div>

            </div>

        </div>

        {{-- Menu --}}
        <a
            href="{{ route('admin.profil') }}"
            class="flex items-center gap-3 px-5 py-4 hover:bg-gray-100 transition">

            👤

            <span>

                Profil Admin

            </span>

        </a>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const adminButton = document.getElementById('adminButton');
    const adminMenu = document.getElementById('adminMenu');
    const adminArrow = document.getElementById('adminArrow');

    if (!adminButton || !adminMenu) return;

    adminButton.addEventListener('click', function (e) {

        e.stopPropagation();

        adminMenu.classList.toggle('hidden');

        adminArrow.innerHTML =
            adminMenu.classList.contains('hidden')
                ? "▼"
                : "▲";

    });

    document.addEventListener('click', function (e) {

        if (
            !adminMenu.contains(e.target) &&
            !adminButton.contains(e.target)
        ) {

            adminMenu.classList.add('hidden');

            adminArrow.innerHTML = "▼";

        }

    });

});

</script>

</header>