@extends('layouts.admin')

@section('content')

{{-- ========================================================= --}}
{{-- HALAMAN TAMBAH PRODUK --}}
{{-- Digunakan untuk menambahkan Produk Utama.                 --}}
{{-- Harga, stok, ukuran, satuan dan status akan dikelola      --}}
{{-- pada menu Kelola Jenis Kayu.                              --}}
{{-- ========================================================= --}}

<div class="mb-8">

    <h1 class="text-3xl font-bold text-gray-800">

        Tambah Produk

    </h1>

    <p class="text-gray-500 mt-2">

        Tambahkan produk utama Mekar Mandiri.

    </p>

</div>

<div class="bg-white rounded-xl shadow p-8">

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
    {{-- FORM TAMBAH PRODUK --}}
    {{-- ========================================================= --}}

    <form action="{{ route('produk.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Nama Produk --}}
            <div>

                <label class="block font-medium mb-2">

                    Nama Produk

                </label>

                <input
                    type="text"
                    name="nama_produk"
                    value="{{ old('nama_produk') }}"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-600"
                    required>

            </div>

            {{-- Kategori --}}
            <div>

                <label class="block font-medium mb-2">

                    Kategori

                </label>

                <select
                    name="kategori"
                    class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-600"
                    required>

                    <option value="">Pilih Kategori</option>

                    <option value="Kayu">Kayu</option>

                    <option value="Plywood">Plywood</option>

                    <option value="MDF">MDF</option>

                    <option value="Furniture">Furniture</option>

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
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-green-600"
                required>{{ old('deskripsi') }}</textarea>

        </div>

        {{-- Upload Foto --}}
        <div class="mt-6">

            <label class="block font-medium mb-2">

                Foto Produk

            </label>

            <input
                type="file"
                name="gambar"
                accept=".jpg,.jpeg,.png"
                class="w-full border rounded-lg p-3">

            <p class="text-sm text-gray-500 mt-2">

                Format JPG, JPEG atau PNG. Maksimal 2 MB.

            </p>

        </div>



        {{-- Produk Unggulan --}}
<div class="mt-6">

    <div class="border rounded-lg p-5 bg-yellow-50 border-yellow-200">

        <label class="flex items-start gap-3 cursor-pointer">

            <input
                type="checkbox"
                name="unggulan"
                value="1"
                {{ old('unggulan') ? 'checked' : '' }}
                class="mt-1 w-5 h-5 text-green-600 rounded">

            <div>

                <h3 class="font-semibold text-gray-800">

                    Jadikan Produk Unggulan

                </h3>

                <p class="text-sm text-gray-600 mt-1">

                    Produk yang dicentang akan berkesempatan ditampilkan
                    pada halaman Beranda pelanggan sebagai produk unggulan.

                </p>

            </div>

        </label>

    </div>

</div>

        {{-- Informasi --}}
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">

            <p class="text-blue-700">

                <strong>Informasi :</strong>

                Setelah produk berhasil dibuat,
                silakan masuk ke menu
                <strong>Kelola Jenis</strong>
                untuk menambahkan ukuran, harga,
                stok dan satuan produk.

            </p>

        </div>

        {{-- Tombol --}}
        <div class="flex gap-4 mt-8">

            <button
                type="submit"
                class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-lg">

                Simpan Produk

            </button>

            <a href="{{ route('produk.index') }}"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-8 py-3 rounded-lg">

                Batal

            </a>

        </div>

    </form>

</div>

@endsection