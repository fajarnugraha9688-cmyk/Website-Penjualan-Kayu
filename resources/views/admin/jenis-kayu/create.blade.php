@extends('layouts.admin')

@section('content')

{{-- ========================================================= --}}
{{-- HALAMAN TAMBAH JENIS KAYU --}}
{{-- Dashboard → Produk → Kelola Jenis Kayu → Tambah --}}
{{-- ========================================================= --}}

<div class="mb-8">

    <h1 class="text-3xl font-bold text-gray-800">
        Tambah Jenis Kayu
    </h1>

    <p class="text-gray-500 mt-2">
        Produk :
        <span class="font-semibold text-green-700">
            {{ $product->nama_produk }}
        </span>
    </p>

</div>

{{-- ========================================================= --}}
{{-- VALIDASI ERROR --}}
{{-- ========================================================= --}}

@if ($errors->any())

<div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg mb-6">

    <ul class="list-disc ml-5">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

{{-- ========================================================= --}}
{{-- FORM TAMBAH JENIS KAYU --}}
{{-- ========================================================= --}}

<div class="bg-white rounded-xl shadow p-8">

    <form action="{{ route('jenis-kayu.store', $product->id) }}" method="POST">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Jenis Kayu --}}
            <div>

                <label class="block font-medium mb-2">
                    Jenis Kayu
                </label>

                <input
                    type="text"
                    name="jenis"
                    value="{{ old('jenis') }}"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-600"
                    placeholder="Contoh : Balok"
                    required>

            </div>

            {{-- Ukuran --}}
            <div>

                <label class="block font-medium mb-2">
                    Ukuran
                </label>

                <input
                    type="text"
                    name="ukuran"
                    value="{{ old('ukuran') }}"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-600"
                    placeholder="Contoh : 5 x 7 x 400 cm"
                    required>

            </div>

            {{-- Satuan --}}
            <div>

                <label class="block font-medium mb-2">
                    Satuan
                </label>

                <select
                    name="satuan"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-600"
                    required>

                    <option value="">-- Pilih Satuan --</option>

                    <option value="Batang"
                        {{ old('satuan') == 'Batang' ? 'selected' : '' }}>
                        Batang
                    </option>

                    <option value="Lembar"
                        {{ old('satuan') == 'Lembar' ? 'selected' : '' }}>
                        Lembar
                    </option>

                    <option value="Kubik"
                        {{ old('satuan') == 'Kubik' ? 'selected' : '' }}>
                        Kubik
                    </option>

                     <option value="Kubik"
                        {{ old('satuan') == 'Kubik' ? 'selected' : '' }}>
                        Reng
                    </option>

                </select>

            </div>

            {{-- Harga --}}
            <div>

                <label class="block font-medium mb-2">
                    Harga
                </label>

                <input
                    type="number"
                    name="harga"
                    value="{{ old('harga') }}"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-600"
                    placeholder="Contoh : 180000"
                    required>

            </div>

            {{-- Stok --}}
            <div>

                <label class="block font-medium mb-2">
                    Stok
                </label>

                <input
                    type="number"
                    name="stok"
                    value="{{ old('stok') }}"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-600"
                    placeholder="Contoh : 100"
                    required>

            </div>

            {{-- Status --}}
            <div>

                <label class="block font-medium mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-600"
                    required>

                    <option value="Aktif"
                        {{ old('status') == 'Aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="Habis"
                        {{ old('status') == 'Habis' ? 'selected' : '' }}>
                        Habis
                    </option>

                </select>

            </div>

        </div>

        {{-- Tombol --}}
        <div class="flex gap-4 mt-8">

            <button
                type="submit"
                class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-lg">

                Simpan Jenis Kayu

            </button>

            <a href="{{ route('jenis-kayu.index', $product->id) }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-8 py-3 rounded-lg">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection