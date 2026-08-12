@extends('layouts.app')

@section('content')

<section class="bg-gray-50 py-16">

    <div class="max-w-7xl mx-auto px-6">

        {{-- ====================================================== --}}
        {{-- JUDUL --}}
        {{-- ====================================================== --}}

        <div class="text-center mb-16">

            <h1 class="text-5xl font-bold text-gray-800 mb-5">

                {{ $setting->tentang_judul }}

            </h1>

            <p class="max-w-3xl mx-auto text-gray-600 leading-8">

                {{ $setting->tentang_deskripsi }}

            </p>

        </div>

        {{-- ====================================================== --}}
        {{-- SEJARAH PERUSAHAAN --}}
        {{-- ====================================================== --}}

        <div class="grid lg:grid-cols-2 gap-14 items-center mb-20">

            {{-- FOTO --}}
            <div>

                <div class="rounded-2xl overflow-hidden shadow-lg h-[430px]">

                    @if($setting->foto_tentang)

                        <img
                            src="{{ asset('storage/' . $setting->foto_tentang) }}"
                            alt="{{ $setting->nama_perusahaan }}"
                            class="w-full h-full object-cover">

                    @else

                        <img
                            src="https://placehold.co/700x450?text=Tentang+Kami"
                            alt="Tentang Kami"
                            class="w-full h-full object-cover">

                    @endif

                </div>

            </div>

            {{-- DESKRIPSI --}}
            <div class="flex flex-col justify-center h-[430px]">

                <h2 class="text-3xl font-bold text-gray-800 mb-6">

                    Sejarah Perusahaan

                </h2>

                <div class="overflow-y-auto pr-2">

                    <p class="text-gray-600 leading-8 text-justify">

                        {{ $setting->sejarah }}

                    </p>

                </div>

            </div>

        </div>

        {{-- ====================================================== --}}
        {{-- VISI MISI KEUNGGULAN --}}
        {{-- ====================================================== --}}

        <div class="grid lg:grid-cols-3 gap-8 mb-20">
                        {{-- ====================================================== --}}
            {{-- VISI --}}
            {{-- ====================================================== --}}

            <div class="bg-white rounded-2xl shadow-lg p-8 h-[430px] flex flex-col">

                <div class="text-5xl mb-5">
                    🎯
                </div>

                <h3 class="text-2xl font-bold text-gray-800 mb-5">
                    Visi
                </h3>

                <div class="flex-1 overflow-y-auto">

                    <p class="text-gray-600 leading-8 text-justify">

                        {{ $setting->visi }}

                    </p>

                </div>

            </div>

            {{-- ====================================================== --}}
            {{-- MISI --}}
            {{-- ====================================================== --}}

            <div class="bg-white rounded-2xl shadow-lg p-8 h-[430px] flex flex-col">

                <div class="text-5xl mb-5">
                    🚀
                </div>

                <h3 class="text-2xl font-bold text-gray-800 mb-5">
                    Misi
                </h3>

                <div class="flex-1 overflow-y-auto">

                    <ul class="list-disc pl-6 space-y-3 text-gray-600 leading-8">

                        @foreach(explode("\n", $setting->misi) as $item)

                            @if(trim($item) != '')

                                <li>{{ trim($item) }}</li>

                            @endif

                        @endforeach

                    </ul>

                </div>

            </div>

            {{-- ====================================================== --}}
            {{-- KEUNGGULAN --}}
            {{-- ====================================================== --}}

            <div class="bg-white rounded-2xl shadow-lg p-8 h-[430px] flex flex-col">

                <div class="text-5xl mb-5">
                    ⭐
                </div>

                <h3 class="text-2xl font-bold text-gray-800 mb-5">
                    Keunggulan
                </h3>

                <div class="flex-1 overflow-y-auto">

                    <ul class="list-disc pl-6 space-y-3 text-gray-600 leading-8">

                        @foreach(explode("\n", $setting->keunggulan) as $item)

                            @if(trim($item) != '')

                                <li>{{ trim($item) }}</li>

                            @endif

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

      {{-- ====================================================== --}}
{{-- HUBUNGI KAMI --}}
{{-- ====================================================== --}}

<div class="bg-green-700 rounded-2xl shadow-lg text-white p-10">

    <div class="max-w-4xl mx-auto text-center mb-12">

        <h2 class="text-4xl font-bold mb-5">

            Butuh Jenis atau Ukuran Kayu Tertentu?

        </h2>

        <p class="text-green-100 leading-8">

            Katalog produk kami menampilkan berbagai jenis kayu yang tersedia di Mekar Mandiri.
            Apabila Anda membutuhkan <strong>jenis kayu tertentu</strong>, <strong>ukuran khusus</strong>,
            atau ingin berkonsultasi mengenai kebutuhan kayu untuk proyek konstruksi, furnitur,
            maupun keperluan lainnya, silakan hubungi kami.
            Tim Mekar Mandiri siap membantu memberikan informasi mengenai
            <strong>ketersediaan produk, spesifikasi, serta penawaran harga</strong>
            sesuai dengan kebutuhan Anda.

        </p>

    </div>

    <div class="grid md:grid-cols-3 gap-8">

        {{-- Alamat --}}
        <div class="bg-white/10 rounded-xl p-6 text-center min-h-[220px] flex flex-col justify-center transition duration-300 hover:bg-white/20">

            <div class="text-5xl mb-4">
                📍
            </div>

            <h4 class="font-bold text-xl mb-3">

                Alamat

            </h4>

            <a
                href="https://www.google.com/maps/search/?api=1&query={{ urlencode($setting->alamat) }}"
                target="_blank"
                class="leading-7 hover:text-yellow-300 transition duration-300">

                {{ $setting->alamat }}

            </a>

        </div>

        {{-- WhatsApp --}}
        <div class="bg-white/10 rounded-xl p-6 text-center min-h-[220px] flex flex-col justify-center transition duration-300 hover:bg-white/20">

            <div class="text-5xl mb-4">
                📞
            </div>

            <h4 class="font-bold text-xl mb-3">

                WhatsApp

            </h4>

            <a
                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp) }}"
                target="_blank"
                class="hover:text-yellow-300 transition duration-300">

                {{ $setting->whatsapp }}

            </a>

        </div>

        {{-- Email --}}
        <div class="bg-white/10 rounded-xl p-6 text-center min-h-[220px] flex flex-col justify-center transition duration-300 hover:bg-white/20">

            <div class="text-5xl mb-4">
                ✉️
            </div>

            <h4 class="font-bold text-xl mb-3">

                Email

            </h4>

            <a
                href="mailto:{{ $setting->email }}"
                class="hover:text-yellow-300 transition duration-300">

                {{ $setting->email }}

            </a>

        </div>

    </div>

</div>

</div>

</section>

@endsection