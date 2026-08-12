@extends('layouts.admin')

@section('content')

{{-- ========================================================= --}}
{{-- HALAMAN EDIT JENIS KAYU --}}
{{-- Dashboard → Produk → Kelola Jenis Kayu → Edit --}}
{{-- ========================================================= --}}

<div class="mb-8">

    <h1 class="text-3xl font-bold text-gray-800">

        Edit Jenis Kayu

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
{{-- FORM EDIT JENIS KAYU --}}
{{-- ========================================================= --}}

<div class="bg-white rounded-xl shadow p-8">

<form action="{{ route('jenis-kayu.update', [$product->id, $jenisKayu->id]) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Jenis --}}
        <div>

            <label class="block font-medium mb-2">

                Jenis Kayu

            </label>

            <input
                type="text"
                name="jenis"
                value="{{ old('jenis',$jenisKayu->jenis) }}"
                class="w-full border rounded-lg p-3"
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
                value="{{ old('ukuran',$jenisKayu->ukuran) }}"
                class="w-full border rounded-lg p-3"
                required>

        </div>

        {{-- Satuan --}}
        <div>

            <label class="block font-medium mb-2">

                Satuan

            </label>

            <select
                name="satuan"
                class="w-full border rounded-lg p-3">

                <option value="Batang"
                {{ $jenisKayu->satuan=='Batang'?'selected':'' }}>

                    Batang

                </option>

                <option value="Lembar"
                {{ $jenisKayu->satuan=='Lembar'?'selected':'' }}>

                    Lembar

                </option>

                <option value="Kubik"
                {{ $jenisKayu->satuan=='Kubik'?'selected':'' }}>

                    Kubik

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
                value="{{ old('harga',$jenisKayu->harga) }}"
                class="w-full border rounded-lg p-3"
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
                value="{{ old('stok',$jenisKayu->stok) }}"
                class="w-full border rounded-lg p-3"
                required>

        </div>

        {{-- Status --}}
        <div>

            <label class="block font-medium mb-2">

                Status

            </label>

            <select
                name="status"
                class="w-full border rounded-lg p-3">

                <option value="Aktif"
                {{ $jenisKayu->status=='Aktif'?'selected':'' }}>

                    Aktif

                </option>

                <option value="Habis"
                {{ $jenisKayu->status=='Habis'?'selected':'' }}>

                    Habis

                </option>

            </select>

        </div>

    </div>

    <div class="flex gap-4 mt-8">

        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg">

            Update Jenis Kayu

        </button>

        <a href="{{ route('jenis-kayu.index',$product->id) }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-8 py-3 rounded-lg">

            Batal

        </a>

    </div>

</form>

</div>

@endsection