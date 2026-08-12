@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-10">

    {{-- ========================================= --}}
    {{-- HEADER --}}
    {{-- ========================================= --}}

    <div class="bg-white rounded-2xl shadow border p-6 mb-8">

        <h1 class="text-3xl font-bold">

            👤 Profil Saya

        </h1>

        <p class="text-gray-500 mt-2">

            Kelola informasi akun dan data pribadi Anda.

        </p>

    </div>

    {{-- ========================================= --}}
    {{-- PROFIL --}}
    {{-- ========================================= --}}

    <div class="bg-white rounded-2xl shadow border p-8">

        <div class="grid md:grid-cols-3 gap-10">

            {{-- FOTO --}}
            <div class="flex flex-col items-center">

                @if($user->foto)

                    <img
                        src="{{ asset('storage/'.$user->foto) }}"
                        class="w-48 h-48 rounded-full object-cover border-4 border-green-700 shadow">

                @else

                    <div class="w-48 h-48 rounded-full bg-gray-200 flex items-center justify-center text-8xl">

                        👤

                    </div>

                    <p class="text-gray-500 mt-4">

                        Belum ada foto profil

                    </p>

                @endif

            </div>

            {{-- FORM --}}
            <div class="md:col-span-2">

                <form
                    action="{{ route('profil.update') }}"
                    method="POST">

                    @csrf
                    @method('PUT')
                <div class="grid md:grid-cols-2 gap-6">

                    {{-- Nama --}}
                    <div>

                        <label class="block mb-2 font-semibold">

                            Nama Lengkap

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $user->name) }}"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">

                    </div>

                    {{-- Email --}}
                    <div>

                        <label class="block mb-2 font-semibold">

                            Email

                        </label>

                        <input
                            type="email"
                            value="{{ $user->email }}"
                            class="w-full border rounded-lg px-4 py-3 bg-gray-100"
                            readonly>

                    </div>

                    {{-- No HP --}}
                    <div>

                        <label class="block mb-2 font-semibold">

                            Nomor HP

                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            value="{{ old('no_hp', $user->no_hp) }}"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">

                    </div>

                    {{-- Alamat --}}
                    <div class="md:col-span-2">

                        <label class="block mb-2 font-semibold">

                            Alamat

                        </label>

                        <textarea
                            name="alamat"
                            rows="4"
                            class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">{{ old('alamat', $user->alamat) }}</textarea>

                    </div>

                </div>

                <div class="mt-8">

                    <button
                        type="submit"
                        class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-lg transition">

                        💾 Simpan Perubahan

                    </button>

                </div>

                </form>

            </div>

        </div>

    </div>

        {{-- ========================================= --}}
    {{-- UPLOAD FOTO PROFIL --}}
    {{-- ========================================= --}}

    <div class="bg-white rounded-2xl shadow border p-8 mt-8">

        <h2 class="text-2xl font-bold mb-6">

            📷 Upload Foto Profil

        </h2>

        <form
            action="{{ route('profil.foto') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div>

                <label class="block font-semibold mb-2">

                    Pilih Foto

                </label>

                <input
                    type="file"
                    name="foto"
                    accept=".jpg,.jpeg,.png"
                    class="w-full border rounded-lg p-3">

                <p class="text-gray-500 text-sm mt-2">

                    Format: JPG, JPEG, PNG (Maksimal 2 MB)

                </p>

            </div>

            <button
                type="submit"
                class="mt-6 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition">

                📷 Upload Foto

            </button>

        </form>

    </div>

        {{-- ========================================= --}}
    {{-- GANTI PASSWORD --}}
    {{-- ========================================= --}}

    <div class="bg-white rounded-2xl shadow border p-8 mt-8">

        <h2 class="text-2xl font-bold mb-6">

            🔒 Ganti Password

        </h2>

        <form
            action="{{ route('profil.password') }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-6">

                {{-- Password Lama --}}
                <div class="md:col-span-2">

                    <label class="block font-semibold mb-2">

                        Password Lama

                    </label>

                    <input
                        type="password"
                        name="password_lama"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                {{-- Password Baru --}}
                <div>

                    <label class="block font-semibold mb-2">

                        Password Baru

                    </label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                {{-- Konfirmasi Password --}}
                <div>

                    <label class="block font-semibold mb-2">

                        Konfirmasi Password

                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

            </div>

            <button
                type="submit"
                class="mt-6 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg transition">

                🔒 Ubah Password

            </button>

        </form>

    </div>

</div>

@endsection