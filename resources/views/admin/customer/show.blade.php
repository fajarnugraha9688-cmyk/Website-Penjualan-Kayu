@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    {{-- ========================================= --}}
    {{-- HEADER --}}
    {{-- ========================================= --}}
    <div class="bg-white rounded-2xl shadow border p-6">

        <h1 class="text-3xl font-bold">

            👤 Detail Pelanggan

        </h1>

        <p class="text-gray-500 mt-2">

            Informasi lengkap pelanggan beserta riwayat pesanannya.

        </p>

    </div>

  {{-- ========================================= --}}
{{-- INFORMASI PELANGGAN --}}
{{-- ========================================= --}}

<div class="bg-white rounded-2xl shadow border p-8">

    <div class="grid md:grid-cols-3 gap-8 items-start">

        {{-- FOTO --}}
        <div class="flex flex-col items-center">

            @if($customer->foto)

                <img
                    src="{{ asset('storage/' . $customer->foto) }}"
                    alt="Foto Pelanggan"
                    class="w-44 h-44 rounded-full object-cover border-4 border-green-600 shadow">

            @else

                <div class="w-44 h-44 rounded-full bg-gray-200 flex items-center justify-center text-7xl shadow">

                    👤

                </div>

                <p class="text-gray-500 text-sm mt-4">

                    Belum ada foto profil

                </p>

            @endif

        </div>

        {{-- BIODATA --}}
        <div class="md:col-span-2">

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <p class="text-gray-500">

                        Nama

                    </p>

                    <h2 class="text-xl font-bold">

                        {{ $customer->name }}

                    </h2>

                </div>

                <div>

                    <p class="text-gray-500">

                        Email

                    </p>

                    <h2 class="text-xl">

                        {{ $customer->email }}

                    </h2>

                </div>

                <div>

                    <p class="text-gray-500">

                        No HP

                    </p>

                    <h2 class="text-xl">

                        {{ $customer->no_hp }}

                    </h2>

                </div>

                <div>

                    <p class="text-gray-500">

                        Jumlah Order

                    </p>

                    <h2 class="text-xl font-bold text-green-700">

                        {{ $customer->orders->count() }}

                    </h2>

                </div>

                <div class="md:col-span-2">

                    <p class="text-gray-500">

                        Alamat

                    </p>

                    <h2 class="text-xl">

                        {{ $customer->alamat }}

                    </h2>

                </div>

            </div>

        </div>

    </div>

</div>

    {{-- ========================================= --}}
    {{-- RIWAYAT PESANAN --}}
    {{-- ========================================= --}}

    <div class="bg-white rounded-2xl shadow border overflow-hidden">

        <table class="w-full">

            <thead class="bg-green-700 text-white">

                <tr>

                    <th class="px-5 py-4 text-left">

                        Kode Order

                    </th>

                    <th class="px-5 py-4 text-left">

                        Total

                    </th>

                    <th class="px-5 py-4 text-left">

                        Pembayaran

                    </th>

                    <th class="px-5 py-4 text-left">

                        Status

                    </th>

                    <th class="px-5 py-4 text-left">

                        Tanggal

                    </th>

                </tr>

            </thead>

            <tbody>
                @forelse($customer->orders as $order)

                <tr class="border-b hover:bg-gray-50">

                    <td class="px-5 py-4 font-semibold">

                        {{ $order->kode_order }}

                    </td>

                    <td class="px-5 py-4">

                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}

                    </td>

                    <td class="px-5 py-4">

                        @if($order->status_pembayaran == 'Lunas')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                {{ $order->status_pembayaran }}

                            </span>

                        @elseif($order->status_pembayaran == 'Menunggu Verifikasi')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                                {{ $order->status_pembayaran }}

                            </span>

                        @elseif($order->status_pembayaran == 'Ditolak')

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                                {{ $order->status_pembayaran }}

                            </span>

                        @else

                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">

                                {{ $order->status_pembayaran }}

                            </span>

                        @endif

                    </td>

                    <td class="px-5 py-4">

                        @if($order->status_pesanan == 'Selesai')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                {{ $order->status_pesanan }}

                            </span>

                        @elseif($order->status_pesanan == 'Dikirim')

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                                {{ $order->status_pesanan }}

                            </span>

                        @elseif($order->status_pesanan == 'Diproses')

                            <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm">

                                {{ $order->status_pesanan }}

                            </span>

                        @else

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                                {{ $order->status_pesanan }}

                            </span>

                        @endif

                    </td>

                    <td class="px-5 py-4">

                        {{ $order->created_at->format('d M Y') }}

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center py-10 text-gray-500">

                        Pelanggan ini belum memiliki pesanan.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- ========================================= --}}
    {{-- TOMBOL KEMBALI --}}
    {{-- ========================================= --}}

    <div>

        <a
            href="{{ route('pelanggan.index') }}"
            class="inline-flex items-center bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-lg transition">

            ← Kembali

        </a>

    </div>

</div>

@endsection