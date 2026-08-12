<section class="max-w-lg mx-auto px-6 py-16">

    <div class="border rounded-lg shadow-lg p-8">

        <h1 class="text-3xl font-bold text-center mb-2">
            Login Sistem
        </h1>

        <p class="text-center text-gray-600 mb-8">
            Silakan login menggunakan akun Anda.
        </p>

        {{-- Pesan Error --}}
        @if(session('error'))

            <div class="bg-red-100 border border-red-300 text-red-700 p-3 rounded-lg mb-5">

                {{ session('error') }}

            </div>

        @endif

        <form method="POST"
              action="{{ route('login.proses') }}">

            @csrf

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
                    placeholder="Masukkan Email"
                    required>

                @error('email')

                    <small class="text-red-600">

                        {{ $message }}

                    </small>

                @enderror

            </div>

            {{-- Password --}}
            <div class="mb-6">

                <label class="block mb-2 font-medium">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg p-3"
                    placeholder="Masukkan Password"
                    required>

                @error('password')

                    <small class="text-red-600">

                        {{ $message }}

                    </small>

                @enderror

            </div>

            <button
                type="submit"
                class="w-full bg-green-700 hover:bg-green-800 text-white py-3 rounded-lg">

                Login

            </button>

        </form>

        <div class="text-center mt-8">

            <p>

                Belum memiliki akun?

                <a href="/register"
                   class="text-green-700 font-semibold">

                    Daftar Sekarang

                </a>

            </p>

        </div>

    </div>

</section>