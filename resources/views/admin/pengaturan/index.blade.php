@extends('layouts.admin')

@section('content')

@if(session('success'))

<div class="mb-6 rounded-xl bg-green-100 border border-green-300 text-green-800 px-5 py-4">

    ✅ {{ session('success') }}

</div>

@endif

<div class="space-y-8">

    {{-- Header --}}
    <div>

        <h1 class="text-3xl font-bold text-gray-800">

            Pengaturan Website

        </h1>

        <p class="text-gray-500 mt-2">

            Kelola informasi website Mekar Mandiri.

        </p>

    </div>

    <form
        action="{{ route('pengaturan.update') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="space-y-8">

           {{-- ===================================== --}}
{{-- INFORMASI PERUSAHAAN --}}
{{-- ===================================== --}}

<div class="bg-white rounded-2xl shadow border p-6">

    <h2 class="text-xl font-bold mb-6">

        🏢 Informasi Perusahaan

    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        <div>

            <label class="font-medium">

                Nama Perusahaan

            </label>

            <input
                type="text"
                name="nama_perusahaan"
                value="{{ old('nama_perusahaan',$setting->nama_perusahaan) }}"
                class="mt-2 w-full border rounded-lg px-4 py-3">

        </div>

        <div>

            <label class="font-medium">

                Tagline

            </label>

            <input
                type="text"
                name="tagline"
                value="{{ old('tagline',$setting->tagline) }}"
                class="mt-2 w-full border rounded-lg px-4 py-3">

        </div>

        <div class="md:col-span-2">

            <label class="font-medium">

                Logo

            </label>

            <input
                type="file"
                name="logo"
                class="mt-2 w-full">

        </div>

    </div>

</div>

{{-- ===================================== --}}
{{-- BERANDA --}}
{{-- ===================================== --}}

<div class="bg-white rounded-2xl shadow border p-6">

    <h2 class="text-xl font-bold mb-6">

        🏠 Beranda

    </h2>

    <div class="space-y-5">

        <div>

            <label class="font-medium">

                Judul Hero

            </label>

            <input
                type="text"
                name="hero_judul"
                value="{{ old('hero_judul',$setting->hero_judul) }}"
                class="mt-2 w-full border rounded-lg px-4 py-3">

        </div>

        <div>

            <label class="font-medium">

                Deskripsi Hero

            </label>

            <textarea
                name="hero_deskripsi"
                rows="4"
                class="mt-2 w-full border rounded-lg px-4 py-3">{{ old('hero_deskripsi',$setting->hero_deskripsi) }}</textarea>

        </div>

        <div>

            <label class="font-medium">

                Banner Hero

            </label>

            <input
                type="file"
                name="hero_banner"
                class="mt-2 w-full">

        </div>

    </div>

</div>

           {{-- ===================================== --}}
{{-- TENTANG KAMI --}}
{{-- ===================================== --}}

<div class="bg-white rounded-2xl shadow border p-6">

    <h2 class="text-xl font-bold mb-6">

        📖 Tentang Kami

    </h2>

    <div class="space-y-5">

        <div>

            <label class="font-medium">

                Judul Tentang Kami

            </label>

            <input
                type="text"
                name="tentang_judul"
                value="{{ old('tentang_judul', $setting->tentang_judul) }}"
                class="mt-2 w-full border rounded-lg px-4 py-3">

        </div>

        <div>

            <label class="font-medium">

                Deskripsi Tentang Kami

            </label>

            <textarea
                name="tentang_deskripsi"
                rows="6"
                class="mt-2 w-full border rounded-lg px-4 py-3">{{ old('tentang_deskripsi', $setting->tentang_deskripsi) }}</textarea>

        </div>

        
        <div>

    <label class="font-medium">

        Sejarah Perusahaan

    </label>

    <textarea
        name="sejarah"
        rows="5"
        class="mt-2 w-full border rounded-lg px-4 py-3">{{ old('sejarah', $setting->sejarah) }}</textarea>

</div>

        <div>

            <label class="font-medium">

                Visi

            </label>

            <textarea
                name="visi"
                rows="4"
                class="mt-2 w-full border rounded-lg px-4 py-3">{{ old('visi', $setting->visi) }}</textarea>

        </div>


        <div>

            <label class="font-medium">

                Misi

            </label>

            <textarea
                name="misi"
                rows="5"
                class="mt-2 w-full border rounded-lg px-4 py-3">{{ old('misi', $setting->misi) }}</textarea>

        </div>

        <div>

    <label class="font-medium">

        Keunggulan Perusahaan

    </label>

    <textarea
        name="keunggulan"
        rows="5"
        class="mt-2 w-full border rounded-lg px-4 py-3">{{ old('keunggulan', $setting->keunggulan) }}</textarea>

</div>

        <div>

            <label class="font-medium">

                Foto Tentang Kami

            </label>

            <input
                type="file"
                name="foto_tentang"
                class="mt-2 w-full">

        </div>

    </div>

</div>

            {{-- ===================================== --}}
{{-- KONTAK --}}
{{-- ===================================== --}}

<div class="bg-white rounded-2xl shadow border p-6">

    <h2 class="text-xl font-bold mb-6">

        📞 Kontak

    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        <div>

            <label class="font-medium">

                WhatsApp

            </label>

            <input
                type="text"
                name="whatsapp"
                value="{{ old('whatsapp', $setting->whatsapp) }}"
                class="mt-2 w-full border rounded-lg px-4 py-3">

        </div>

        <div>

            <label class="font-medium">

                Email

            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email', $setting->email) }}"
                class="mt-2 w-full border rounded-lg px-4 py-3">

        </div>

        <div>

            <label class="font-medium">

                Telepon

            </label>

            <input
                type="text"
                name="telepon"
                value="{{ old('telepon', $setting->telepon) }}"
                class="mt-2 w-full border rounded-lg px-4 py-3">

        </div>

        <div>

            <label class="font-medium">

                Instagram

            </label>

            <input
                type="text"
                name="instagram"
                value="{{ old('instagram', $setting->instagram) }}"
                class="mt-2 w-full border rounded-lg px-4 py-3">

        </div>

        <div>

            <label class="font-medium">

                Facebook

            </label>

            <input
                type="text"
                name="facebook"
                value="{{ old('facebook', $setting->facebook) }}"
                class="mt-2 w-full border rounded-lg px-4 py-3">

        </div>

        <div class="md:col-span-2">

            <label class="font-medium">

                Alamat

            </label>

            <textarea
                name="alamat"
                rows="3"
                class="mt-2 w-full border rounded-lg px-4 py-3">{{ old('alamat', $setting->alamat) }}</textarea>

        </div>

    </div>

</div>

{{-- ===================================== --}}
{{-- INFORMASI PEMBAYARAN --}}
{{-- ===================================== --}}

<div class="bg-white rounded-2xl shadow border p-6">

    <h2 class="text-xl font-bold mb-6">

        💳 Informasi Pembayaran

    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        <div>

            <label class="font-medium">

                Nama Bank

            </label>

            <input
                type="text"
                name="nama_bank"
                value="{{ old('nama_bank', $setting->nama_bank) }}"
                class="mt-2 w-full border rounded-lg px-4 py-3">

        </div>

        <div>

            <label class="font-medium">

                Nomor Rekening

            </label>

            <input
                type="text"
                name="nomor_rekening"
                value="{{ old('nomor_rekening', $setting->nomor_rekening) }}"
                class="mt-2 w-full border rounded-lg px-4 py-3">

        </div>

        <div class="md:col-span-2">

            <label class="font-medium">

                Atas Nama

            </label>

            <input
                type="text"
                name="atas_nama"
                value="{{ old('atas_nama', $setting->atas_nama) }}"
                class="mt-2 w-full border rounded-lg px-4 py-3">

        </div>

    </div>

</div>

{{-- ===================================== --}}
{{-- FOOTER WEBSITE --}}
{{-- ===================================== --}}

<div class="bg-white rounded-2xl shadow border p-6">

    <h2 class="text-xl font-bold mb-6">

        🦶 Footer Website

    </h2>

    <div>

        <label class="font-medium">

            Deskripsi Footer

        </label>

        <textarea
            name="footer_deskripsi"
            rows="4"
            class="mt-2 w-full border rounded-lg px-4 py-3">{{ old('footer_deskripsi', $setting->footer_deskripsi) }}</textarea>

    </div>

</div>

            {{-- ===================================== --}}
            {{-- TOMBOL --}}
            {{-- ===================================== --}}

            <div>

                <button
                    class="bg-green-700 hover:bg-green-800 text-white px-8 py-4 rounded-xl">

                    💾 Simpan Pengaturan

                </button>

            </div>

        </div>

    </form>

</div>

@endsection