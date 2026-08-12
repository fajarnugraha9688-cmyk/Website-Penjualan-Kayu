@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    {{-- ====================================================== --}}
    {{-- HEADER --}}
    {{-- ====================================================== --}}

   <div class="flex items-center justify-between">

    <div>

        <h1 class="text-3xl font-bold text-gray-800">

            Laporan Penjualan

        </h1>

        <p class="text-gray-500 mt-2">

            Ringkasan seluruh transaksi penjualan Mekar Mandiri.

        </p>

    </div>

    <a
        href="{{ route('laporan.pdf', request()->query()) }}"
        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl shadow transition">

        📄 Export PDF

    </a>

</div>

    {{-- ====================================================== --}}
    {{-- CARD RINGKASAN --}}
    {{-- ====================================================== --}}

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Total Transaksi --}}
        <div
            class="bg-white rounded-2xl shadow border p-6">

            <p class="text-gray-500">

                Total Transaksi

            </p>

            <h2 class="text-4xl font-bold mt-3 text-blue-600">

                {{ $totalTransaksi }}

            </h2>

        </div>

        {{-- Total Pendapatan --}}
        <div
            class="bg-white rounded-2xl shadow border p-6">

            <p class="text-gray-500">

                Total Pendapatan

            </p>

            <h2 class="text-4xl font-bold mt-3 text-green-700">

                Rp {{ number_format($totalPendapatan,0,',','.') }}

            </h2>

        </div>

    </div>

    {{-- ====================================================== --}}
    {{-- FILTER --}}
    {{-- ====================================================== --}}

    <div
        class="bg-white rounded-2xl shadow border p-6">

        <form
            method="GET"
            action="{{ route('laporan.index') }}">

            <div class="grid md:grid-cols-4 gap-5">
                    {{-- Tanggal Awal --}}
                <div>

                    <label class="block mb-2 font-medium text-gray-700">

                        Tanggal Awal

                    </label>

                    <input
                        type="date"
                        name="tanggal_awal"
                        value="{{ request('tanggal_awal') }}"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">

                </div>

                {{-- Tanggal Akhir --}}
                <div>

                    <label class="block mb-2 font-medium text-gray-700">

                        Tanggal Akhir

                    </label>

                    <input
                        type="date"
                        name="tanggal_akhir"
                        value="{{ request('tanggal_akhir') }}"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">

                </div>

                {{-- Status --}}
                <div>

                    <label class="block mb-2 font-medium text-gray-700">

                        Status Pesanan

                    </label>

                    <select
                        name="status"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600">

                        <option value="">

                            Semua Status

                        </option>

                        <option
                            value="Menunggu"
                            {{ request('status') == 'Menunggu' ? 'selected' : '' }}>

                            Menunggu

                        </option>

                        <option
                            value="Diproses"
                            {{ request('status') == 'Diproses' ? 'selected' : '' }}>

                            Diproses

                        </option>

                        <option
                            value="Dikirim"
                            {{ request('status') == 'Dikirim' ? 'selected' : '' }}>

                            Dikirim

                        </option>

                        <option
                            value="Selesai"
                            {{ request('status') == 'Selesai' ? 'selected' : '' }}>

                            Selesai

                        </option>

                    </select>

                </div>

                {{-- Tombol --}}
                <div class="flex items-end gap-3">

                    <button
                        type="submit"
                        class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                        🔍 Filter

                    </button>

                    <a
                        href="{{ route('laporan.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg">

                        Reset

                    </a>

                </div>

            </div>

        </form>

    </div>
   

        {{-- ====================================================== --}}
    {{-- TABEL LAPORAN --}}
    {{-- ====================================================== --}}

    <div class="bg-white rounded-2xl shadow border overflow-hidden">

        <div class="px-6 py-5 border-b">

            <h2 class="text-xl font-bold text-gray-800">

                Data Laporan Penjualan

            </h2>

            <p class="text-gray-500 text-sm mt-1">

                Seluruh transaksi yang sesuai dengan filter.

            </p>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-green-700 text-white">

                    <tr>

                        <th class="px-5 py-4 text-left">
                            No
                        </th>

                        <th class="px-5 py-4 text-left">
                            Invoice
                        </th>

                        <th class="px-5 py-4 text-left">
                            Customer
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

                <tbody class="divide-y divide-gray-200">
                    @forelse ($orders as $order)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-5 py-4">

                                {{ $loop->iteration }}

                            </td>

                            <td class="px-5 py-4 font-semibold text-green-700">

                                {{ $order->kode_order }}

                            </td>

                            <td class="px-5 py-4">

                                {{ $order->user->name }}

                            </td>

                            <td class="px-5 py-4 font-semibold">

                                Rp {{ number_format($order->total_harga,0,',','.') }}

                            </td>

                            <td class="px-5 py-4">

                                @if($order->status_pembayaran == 'Lunas')

                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

                                        Lunas

                                    </span>

                                @elseif($order->status_pembayaran == 'Ditolak')

                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">

                                        Ditolak

                                    </span>

                                @else

                                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">

                                        Menunggu

                                    </span>

                                @endif

                            </td>

                            <td class="px-5 py-4">

                                {{ $order->status_pesanan }}

                            </td>

                            <td class="px-5 py-4">

                                {{ $order->created_at->format('d-m-Y') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-10 text-gray-500">

                                Belum ada data transaksi.

                            </td>

                        </tr>

                    @endforelse
                </tbody>

            </table>

        </div>

        {{-- Footer Tabel --}}
        <div class="px-6 py-4 bg-gray-50 border-t flex justify-between items-center">

            <p class="text-sm text-gray-500">

                Total Data :

                <span class="font-semibold text-gray-700">

                    {{ $orders->count() }}

                </span>

                Transaksi

            </p>

            <p class="text-sm text-gray-500">

                Total Pendapatan :

                <span class="font-semibold text-green-700">

                    Rp {{ number_format($totalPendapatan,0,',','.') }}

                </span>

            </p>

        </div>

    </div>

</div>

@endsection