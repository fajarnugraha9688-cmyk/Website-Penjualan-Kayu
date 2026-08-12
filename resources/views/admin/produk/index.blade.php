@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-3xl font-bold text-gray-800">
                Data Produk
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola seluruh produk utama Mekar Mandiri.
            </p>

        </div>

        <a href="{{ route('produk.create') }}"
            class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

            + Tambah Produk

        </a>

    </div>

</div>


{{-- SUCCESS --}}
@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mt-6">

    {{ session('success') }}

</div>

@endif


<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mt-8">

    {{-- Header Card --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

        <div>

            <h2 class="text-xl font-semibold text-gray-800">
                Daftar Produk
            </h2>

            <p class="text-gray-500 text-sm">

                Total Produk :

                <span class="font-semibold text-green-700">

                    {{ $products->count() }} Produk

                </span>

            </p>

        </div>

        <input
            type="text"
            placeholder="Cari Produk..."
            class="border border-gray-300 rounded-lg px-4 py-2 w-72">

    </div>


    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-gray-100">

                    <th class="px-4 py-4 text-center">
                        No
                    </th>

                    <th class="px-4 py-4">
                        Foto
                    </th>

                    <th class="px-4 py-4">
                        Nama Produk
                    </th>

                    <th class="px-4 py-4">
                        Kategori
                    </th>

                    <th class="px-4 py-4 text-center">
                        Jumlah Jenis
                    </th>

                    <th class="px-4 py-4 text-center">
                        Status
                    </th>

                    <th class="px-4 py-4 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($products as $product)

                <tr class="border-b hover:bg-gray-50">

                    {{-- Nomor --}}
                    <td class="px-4 py-5 text-center">

                        {{ $loop->iteration }}

                    </td>

                    {{-- Foto --}}
                    <td class="px-4 py-5">

                        @if($product->gambar)

                            <img
                                src="{{ asset('storage/'.$product->gambar) }}"
                                class="w-20 h-20 object-cover rounded-xl border shadow-sm">

                        @else

                            <img
                                src="https://placehold.co/80x80"
                                class="w-20 h-20 object-cover rounded-xl border shadow-sm">

                        @endif

                    </td>

                    {{-- Nama --}}
                    <td class="px-4 py-5">

                        <div class="font-semibold text-gray-800 text-lg">

                            {{ $product->nama_produk }}

                        </div>

                        <div class="text-sm text-gray-500">

                            Produk Utama

                        </div>

                    </td>

                    {{-- Kategori --}}
                    <td class="px-4 py-5">

                        {{ $product->kategori }}

                    </td>

                    {{-- Jumlah Jenis --}}
                    <td class="px-4 py-5 text-center">

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                            {{ $product->jenis_kayu_count }} Jenis

                        </span>

                    </td>

                    {{-- Status --}}
                    <td class="px-4 py-5 text-center">

                        @if($product->unggulan)

                            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">

                                ⭐ Unggulan

                            </span>

                        @else

                            <span class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm">

                                Biasa

                            </span>

                        @endif

                    </td>

                    {{-- Aksi --}}
                    <td class="px-4 py-5">

                        <div class="flex justify-center gap-2">

                            <a href="{{ route('jenis-kayu.index',$product->id) }}"
                                class="bg-green-100 hover:bg-green-200 text-green-700 px-3 py-2 rounded-lg">

                                Kelola Jenis

                            </a>

                            <a href="{{ route('produk.edit',$product->id) }}"
                                class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-2 rounded-lg">

                                Edit

                            </a>

                            @if($product->unggulan)

<form
    action="{{ route('produk.unggulan',$product->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <button
        class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-2 rounded-lg">

        ⭐ Hapus Unggulan

    </button>

</form>

@else

<form
    action="{{ route('produk.unggulan',$product->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <button
        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg">

        ⭐ Jadikan Unggulan

    </button>

</form>

@endif

                            <form
                                action="{{ route('produk.destroy',$product->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-lg">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center py-10 text-gray-500">

                        Belum ada data produk.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection