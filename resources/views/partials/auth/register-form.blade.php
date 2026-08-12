<section class="max-w-lg mx-auto px-6 py-16">

    <div class="border rounded-lg shadow-lg p-8">

        <h1 class="text-3xl font-bold text-center mb-2">
            Daftar Akun Customer
        </h1>

        <p class="text-center text-gray-600 mb-8">
            Silakan lengkapi data di bawah ini untuk membuat akun pelanggan.
        </p>

        {{-- Error Validasi --}}
        @if ($errors->any())

            <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg mb-5">

                <ul class="list-disc ml-5">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('register.store') }}" method="POST">

            @csrf

            {{-- Nama --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Nama Lengkap

                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full border rounded-lg p-3"
                    placeholder="Masukkan nama lengkap"
                    required>

            </div>

            {{-- Email --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border rounded-lg p-3"
                    placeholder="Masukkan email"
                    required>

            </div>

            {{-- Nomor HP --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Nomor WhatsApp

                </label>

                <input
                    type="text"
                    name="no_hp"
                    value="{{ old('no_hp') }}"
                    class="w-full border rounded-lg p-3"
                    placeholder="Masukkan nomor WhatsApp"
                    required>

            </div>

            {{-- Alamat --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Alamat

                </label>

                <textarea
                    name="alamat"
                    rows="3"
                    class="w-full border rounded-lg p-3"
                    placeholder="Masukkan alamat lengkap"
                    required>{{ old('alamat') }}</textarea>

            </div>

            {{-- Password --}}
            <div class="mb-5">

                <label class="block mb-2 font-medium">

                    Password

                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg p-3"
                    placeholder="Masukkan password"
                    required>

            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-6">

                <label class="block mb-2 font-medium">

                    Konfirmasi Password

                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full border rounded-lg p-3"
                    placeholder="Ulangi password"
                    required>

            </div>

            <button
                type="submit"
                class="w-full bg-green-700 hover:bg-green-800 text-white py-3 rounded-lg">

                Daftar

            </button>

        </form>

        <div class="text-center mt-8">

            <p>

                Sudah memiliki akun?

                <a href="{{ route('login') }}"
                   class="text-green-700 font-semibold">

                    Login

                </a>

            </p>

        </div>

    </div>

</section>