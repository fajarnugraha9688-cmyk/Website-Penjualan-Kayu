@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-3xl font-bold text-gray-800">

                Data Transaksi

            </h1>

            <p class="text-gray-500 mt-2">

                Kelola seluruh transaksi pelanggan.

            </p>

        </div>

    </div>

</div>

@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mt-6">

    {{ session('success') }}

</div>

@endif


<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mt-8">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-xl font-semibold">

                Daftar Transaksi

            </h2>

            <p class="text-gray-500 text-sm">

                Total Transaksi :

                <span class="font-semibold text-green-700">

                    {{ $orders->count() }}

                </span>

            </p>

        </div>

    </div>


    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-gray-100">

                    <th class="px-4 py-4 text-center">

                        No

                    </th>

                    <th class="px-4 py-4">

                        Kode Order

                    </th>

                    <th class="px-4 py-4">

                        Customer

                    </th>

                    <th class="px-4 py-4">

                        Total

                    </th>

                    <th class="px-4 py-4 text-center">

                        Pembayaran

                    </th>

                    <th class="px-4 py-4 text-center">

                        Pesanan

                    </th>

                    <th class="px-4 py-4">

                        Tanggal

                    </th>

                    <th class="px-4 py-4 text-center">

                        Aksi

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($orders as $order)

                <tr class="border-b hover:bg-gray-50">

                    <td class="px-4 py-5 text-center">

                        {{ $loop->iteration }}

                    </td>

                    <td class="px-4 py-5 font-semibold">

                        {{ $order->kode_order }}

                    </td>

                    <td class="px-4 py-5">

                        {{ $order->nama_pemesan }}

                    </td>

                    <td class="px-4 py-5 font-semibold text-green-700">

                        Rp {{ number_format($order->total_harga,0,',','.') }}

                    </td>

                    <td class="px-4 py-5 text-center">

                        @switch($order->status_pembayaran)

                            @case('Belum Bayar')

                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">

                                    Belum Bayar

                                </span>

                            @break

                            @case('Menunggu Verifikasi')

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                                    Menunggu

                                </span>

                            @break

                            @case('Lunas')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                    Lunas

                                </span>

                            @break

                            @case('Ditolak')

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                                    Ditolak

                                </span>

                            @break

                        @endswitch

                    </td>

                    <td class="px-4 py-5 text-center">

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                            {{ $order->status_pesanan }}

                        </span>

                    </td>

                    <td class="px-4 py-5">

                        {{ $order->created_at->format('d M Y') }}

                    </td>

                   <td class="px-5 py-4 text-center">

    <a
        href="{{ route('transaksi.show', $order->id) }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

        Detail

    </a>

</td>

                </tr>

                @empty

                <tr>

                    <td colspan="8" class="text-center py-10 text-gray-500">

                        Belum ada transaksi.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection