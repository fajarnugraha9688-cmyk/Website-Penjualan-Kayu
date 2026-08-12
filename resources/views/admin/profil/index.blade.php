@extends('layouts.admin')

@section('content')

<div class="p-8">

    {{-- ====================================================== --}}
    {{-- JUDUL --}}
    {{-- ====================================================== --}}

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-800">

            Profil Admin

        </h1>

        <p class="text-gray-500 mt-2">

            Kelola informasi akun administrator.

        </p>

    </div>

    {{-- ====================================================== --}}
    {{-- ALERT --}}
    {{-- ====================================================== --}}

    @if(session('success'))

        <div
            class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">

            {{ session('success') }}

        </div>

    @endif

    {{-- ====================================================== --}}
    {{-- FORM --}}
    {{-- ====================================================== --}}

    <form
        action="{{ route('admin.profil.update') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl shadow border p-8">

            <div class="grid lg:grid-cols-3 gap-10">
                                {{-- ====================================================== --}}
                {{-- FOTO PROFIL --}}
                {{-- ====================================================== --}}

                <div class="flex flex-col items-center">

                    @if($user->foto)

                        <img
                            src="{{ asset('storage/'.$user->foto) }}"
                            class="w-48 h-48 rounded-full object-cover border-4 border-green-600 shadow-lg">

                    @else

                        <div class="w-48 h-48 rounded-full bg-green-100 flex items-center justify-center text-7xl">

                            👤

                        </div>

                    @endif

                    <label class="mt-6 font-semibold text-gray-700">

                        Foto Profil

                    </label>

                    <input
                        type="file"
                        name="foto"
                        class="mt-3 w-full border rounded-lg p-3">

                </div>

                {{-- ====================================================== --}}
                {{-- DATA ADMIN --}}
                {{-- ====================================================== --}}

                <div class="lg:col-span-2 space-y-6">

                    {{-- Nama --}}
                    <div>

                        <label class="font-semibold text-gray-700">

                            Nama Lengkap

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name',$user->name) }}"
                            class="w-full mt-2 border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">

                    </div>

                    {{-- Email --}}
                    <div>

                        <label class="font-semibold text-gray-700">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email',$user->email) }}"
                            class="w-full mt-2 border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">

                    </div>

                    {{-- Nomor HP --}}
                    <div>

                        <label class="font-semibold text-gray-700">

                            Nomor HP

                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            value="{{ old('no_hp',$user->no_hp) }}"
                            class="w-full mt-2 border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">

                    </div>

                    {{-- Alamat --}}
                    <div>

                        <label class="font-semibold text-gray-700">

                            Alamat

                        </label>

                        <textarea
                            name="alamat"
                            rows="4"
                            class="w-full mt-2 border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">{{ old('alamat',$user->alamat) }}</textarea>

                    </div>

                    <hr>

                    {{-- Password Baru --}}
                    <div>

                        <label class="font-semibold text-gray-700">

                            Password Baru

                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full mt-2 border rounded-lg px-4 py-3">
                      
                       <p class="mt-2 text-sm text-gray-500">
    Kosongkan password jika tidak ingin mengubah password.
</p>

                    </div>

                    {{-- Konfirmasi Password --}}
                    <div>

                        <label class="font-semibold text-gray-700">

                            Konfirmasi Password

                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="w-full mt-2 border rounded-lg px-4 py-3">
                     
     <p class="mt-2 text-sm text-gray-500">
    Isi hanya jika Anda ingin mengganti password akun.
</p>

                    </div>

                    <div class="pt-4">

                        <button
                            type="submit"
                            class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-lg transition">

                            Simpan Perubahan

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection