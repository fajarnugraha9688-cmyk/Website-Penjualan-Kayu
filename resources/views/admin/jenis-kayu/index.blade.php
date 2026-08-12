@extends('layouts.admin')

@section('content')

{{-- ========================================================= --}}
{{-- HEADER HALAMAN --}}
{{-- Dashboard → Produk → Kelola Jenis Kayu --}}
{{-- ========================================================= --}}

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">

            Kelola Jenis Kayu

        </h1>

        <p class="text-gray-500 mt-2">

            Produk :

            <span class="font-semibold text-green-700">

                {{ $product->nama_produk }}

            </span>

        </p>

    </div>

    <a href="{{ route('jenis-kayu.create', $product->id) }}"
       class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

        + Tambah Jenis Kayu

    </a>

</div>


{{-- ========================================================= --}}
{{-- PESAN BERHASIL --}}
{{-- ========================================================= --}}

@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mb-6">

    {{ session('success') }}

</div>

@endif


{{-- ========================================================= --}}
{{-- CARD DATA --}}
{{-- ========================================================= --}}

<div class="bg-white rounded-xl shadow p-6">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-gray-100 border-b">

                    <th class="text-left px-5 py-4">
                        No
                    </th>

                    <th class="text-left px-5 py-4">
                        Jenis
                    </th>

                    <th class="text-left px-5 py-4">
                        Ukuran
                    </th>

                    <th class="text-left px-5 py-4">
                        Satuan
                    </th>

                    <th class="text-left px-5 py-4">
                        Harga
                    </th>

                    <th class="text-left px-5 py-4">
                        Stok
                    </th>

                    <th class="text-left px-5 py-4">
                        Status
                    </th>

                    <th class="text-center px-5 py-4">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($jenisKayus as $jenis)

                <tr class="border-b hover:bg-gray-50">

                    <td class="px-5 py-4">

                        {{ $loop->iteration }}

                    </td>

                    <td class="px-5 py-4 font-semibold">

                        {{ $jenis->jenis }}

                    </td>

                    <td class="px-5 py-4">

                        {{ $jenis->ukuran }}

                    </td>

                    <td class="px-5 py-4">

                        {{ $jenis->satuan }}

                    </td>

                    <td class="px-5 py-4 text-green-700 font-semibold">

                        Rp {{ number_format($jenis->harga,0,',','.') }}

                    </td>

                    <td class="px-5 py-4">

                        {{ $jenis->stok }}

                    </td>

                    <td class="px-5 py-4">

                        @if($jenis->status=='Aktif')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                Aktif

                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                                Habis

                            </span>

                        @endif

                    </td>

                    <td class="px-5 py-4">

                        <div class="flex justify-center gap-2">

                          <a href="{{ route('jenis-kayu.edit', [$product->id, $jenis->id]) }}"
   class="bg-blue-100 hover:bg-blue-200 text-blue-600 px-3 py-2 rounded-lg">

    Edit

</a>

                           <form
    action="{{ route('jenis-kayu.destroy', [$product->id, $jenis->id]) }}"
    method="POST"
    onsubmit="return confirm('Yakin ingin menghapus Jenis Kayu ini?')">

    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="bg-red-100 hover:bg-red-200 text-red-600 px-3 py-2 rounded-lg">

        Hapus

    </button>

</form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8"
                        class="text-center py-10 text-gray-500">

                        Belum ada data Jenis Kayu.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection