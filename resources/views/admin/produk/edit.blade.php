@extends('layouts.admin')

@section('content')

{{-- ========================================================= --}}
{{-- HALAMAN EDIT PRODUK --}}
{{-- Produk hanya menyimpan informasi utama.                  --}}
{{-- Harga, stok, ukuran, satuan dan status                   --}}
{{-- dikelola pada menu Kelola Jenis Kayu.                    --}}
{{-- ========================================================= --}}

<div class="mb-8">

    <h1 class="text-3xl font-bold text-gray-800">

        Edit Produk

    </h1>

    <p class="text-gray-500 mt-2">

        Ubah informasi utama produk.

    </p>

</div>

<div class="bg-white rounded-xl shadow p-8">

    {{-- ========================================================= --}}
    {{-- VALIDASI --}}
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
    {{-- FORM EDIT --}}
    {{-- ========================================================= --}}

    <form action="{{ route('produk.update',$product->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-6">

            {{-- Nama Produk --}}
            <div>

                <label class="block font-medium mb-2">

                    Nama Produk

                </label>

                <input
                    type="text"
                    name="nama_produk"
                    value="{{ old('nama_produk',$product->nama_produk) }}"
                    class="w-full border rounded-lg p-3"
                    required>

            </div>

            {{-- Kategori --}}
            <div>

                <label class="block font-medium mb-2">

                    Kategori

                </label>

                <select
                    name="kategori"
                    class="w-full border rounded-lg p-3"
                    required>

                    <option value="Kayu"
                        {{ $product->kategori=='Kayu' ? 'selected' : '' }}>
                        Kayu
                    </option>

                    <option value="Plywood"
                        {{ $product->kategori=='Plywood' ? 'selected' : '' }}>
                        Plywood
                    </option>

                    <option value="MDF"
                        {{ $product->kategori=='MDF' ? 'selected' : '' }}>
                        MDF
                    </option>

                    <option value="Furniture"
                        {{ $product->kategori=='Furniture' ? 'selected' : '' }}>
                        Furniture
                    </option>

                </select>

            </div>

        </div>

        {{-- Deskripsi --}}
        <div class="mt-6">

            <label class="block font-medium mb-2">

                Deskripsi Produk

            </label>

            <textarea
                name="deskripsi"
                rows="5"
                class="w-full border rounded-lg p-3"
                required>{{ old('deskripsi',$product->deskripsi) }}</textarea>

        </div>

        {{-- Upload Foto --}}
        <div class="mt-6">

            <label class="block font-medium mb-2">

                Foto Produk

            </label>

            <input
                type="file"
                name="gambar"
                class="w-full border rounded-lg p-3">

            <p class="text-sm text-gray-500 mt-2">

                Kosongkan apabila tidak ingin mengganti foto.

            </p>

        </div>

        {{-- Preview --}}
        @if($product->gambar)

        <div class="mt-6">

            <label class="block font-medium mb-2">

                Foto Saat Ini

            </label>

            <img
                src="{{ asset('storage/'.$product->gambar) }}"
                class="w-48 rounded-lg border shadow">

        </div>

        @endif


        {{-- Produk Unggulan --}}
<div class="mt-6">

    <div class="border rounded-lg p-5 bg-yellow-50 border-yellow-200">

        <label class="flex items-start gap-3 cursor-pointer">

            <input
                type="checkbox"
                name="unggulan"
                value="1"
                {{ old('unggulan', $product->unggulan) ? 'checked' : '' }}
                class="mt-1 w-5 h-5 text-green-600 rounded">

            <div>

                <h3 class="font-semibold text-gray-800">

                    Produk Unggulan

                </h3>

                <p class="text-sm text-gray-600 mt-1">

                    Jika dicentang, produk ini akan ditampilkan
                    pada halaman Beranda pelanggan.

                </p>

            </div>

        </label>

    </div>

</div>

        {{-- Informasi --}}
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">

            <p class="text-blue-700">

                <strong>Informasi :</strong>

                Harga, stok, ukuran,
                satuan dan status
                sekarang dikelola
                melalui menu

                <strong>Kelola Jenis Kayu</strong>

            </p>

        </div>

        {{-- Tombol --}}
        <div class="flex gap-4 mt-8">

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg">

                Update Produk

            </button>

            <a href="{{ route('produk.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-8 py-3 rounded-lg">

                Batal

            </a>

        </div>

    </form>

</div>

@endsection