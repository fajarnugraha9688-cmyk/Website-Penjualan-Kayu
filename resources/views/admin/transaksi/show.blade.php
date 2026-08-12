@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}
    <div>

        <h1 class="text-3xl font-bold text-gray-800">

            Detail Transaksi

        </h1>

        <p class="text-gray-500 mt-2">

            Informasi lengkap transaksi pelanggan.

        </p>

    </div>

    {{-- ========================================================= --}}
    {{-- INFORMASI TRANSAKSI --}}
    {{-- ========================================================= --}}
    <div class="bg-white rounded-2xl shadow border p-6">

        <div class="grid md:grid-cols-2 gap-8">

            <div>

                <p class="text-sm text-gray-500">

                    Kode Order

                </p>

                <h3 class="text-xl font-bold mt-1">

                    {{ $order->kode_order }}

                </h3>

            </div>

            <div>

                <p class="text-sm text-gray-500">

                    Tanggal Transaksi

                </p>

                <h3 class="text-xl font-bold mt-1">

                    {{ $order->created_at->format('d F Y H:i') }}

                </h3>

            </div>

        </div>

    </div>

    {{-- ========================================================= --}}
    {{-- DATA CUSTOMER --}}
    {{-- ========================================================= --}}
    <div class="bg-white rounded-2xl shadow border p-6">

        <h2 class="text-xl font-bold mb-6">

            Data Customer

        </h2>

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <label class="text-sm text-gray-500">

                    Nama Customer

                </label>

                <div class="mt-2 font-semibold">

                    {{ $order->nama_pemesan }}

                </div>

            </div>

            <div>

                <label class="text-sm text-gray-500">

                    Nomor HP

                </label>

                <div class="mt-2 font-semibold">

                    {{ $order->telepon }}

                </div>

            </div>

            <div class="md:col-span-2">

                <label class="text-sm text-gray-500">

                    Alamat

                </label>

                <div class="mt-2 font-semibold">

                    {{ $order->alamat }}

                </div>

            </div>

            @if($order->catatan)

            <div class="md:col-span-2">

                <label class="text-sm text-gray-500">

                    Catatan

                </label>

                <div class="mt-2">

                    {{ $order->catatan }}

                </div>

            </div>

            @endif

        </div>

    </div>

    {{-- ========================================================= --}}
    {{-- DETAIL PESANAN --}}
    {{-- ========================================================= --}}
    <div class="bg-white rounded-2xl shadow border p-6">

        <h2 class="text-xl font-bold mb-6">

            Detail Pesanan

        </h2>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-gray-100">

                        <th class="px-4 py-3 text-center">

                            No

                        </th>

                        <th class="px-4 py-3">

                            Jenis Kayu

                        </th>

                        <th class="px-4 py-3 text-center">

                            Harga

                        </th>

                        <th class="px-4 py-3 text-center">

                            Jumlah

                        </th>

                        <th class="px-4 py-3 text-right">

                            Subtotal

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($order->orderItems as $item)

                    <tr class="border-b">

                        <td class="px-4 py-4 text-center">

                            {{ $loop->iteration }}

                        </td>

                        <td class="px-4 py-4">

                            <div class="font-semibold">

                                {{ $item->jenisKayu->nama }}

                            </div>

                            <div class="text-sm text-gray-500">

                                {{ $item->jenisKayu->ukuran }}

                            </div>

                        </td>

                        <td class="px-4 py-4 text-center">

                            Rp {{ number_format($item->harga,0,',','.') }}

                        </td>

                        <td class="px-4 py-4 text-center">

                            {{ $item->jumlah }}

                        </td>

                        <td class="px-4 py-4 text-right font-semibold">

                            Rp {{ number_format($item->subtotal,0,',','.') }}

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

        {{-- ========================================================= --}}
    {{-- TOTAL PEMBAYARAN --}}
    {{-- ========================================================= --}}
    <div class="bg-white rounded-2xl shadow border p-6">

        <div class="flex items-center justify-between">

            <div>

                <h2 class="text-xl font-bold">

                    Total Pembayaran

                </h2>

                <p class="text-gray-500 mt-1">

                    Total pembayaran pelanggan.

                </p>

            </div>

            <div class="text-right">

                <p class="text-sm text-gray-500">

                    Grand Total

                </p>

                <h2 class="text-3xl font-bold text-green-700">

                    Rp {{ number_format($order->total_harga,0,',','.') }}

                </h2>

            </div>

        </div>

    </div>

    {{-- ========================================================= --}}
    {{-- PEMBAYARAN --}}
    {{-- ========================================================= --}}
    <div class="bg-white rounded-2xl shadow border p-6">

        <h2 class="text-xl font-bold mb-6">

            Bukti Pembayaran

        </h2>

        @if($order->bukti_pembayaran)

            <div class="mb-6">

                <img
                    src="{{ asset('storage/'.$order->bukti_pembayaran) }}"
                    class="rounded-xl border shadow max-w-lg hover:scale-105 transition duration-300">

            </div>

        @else

            <div class="bg-gray-100 rounded-xl p-10 text-center text-gray-500">

                Belum ada bukti pembayaran.

            </div>

        @endif

        <div class="grid md:grid-cols-2 gap-6 mt-8">

            {{-- Status Pembayaran --}}
            <div>

                <p class="text-gray-500 mb-2">

                    Status Pembayaran

                </p>

                @if($order->status_pembayaran == 'Menunggu Verifikasi')

                    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full font-medium">

                        🟡 Menunggu Verifikasi

                    </span>

                @elseif($order->status_pembayaran == 'Lunas')

                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-medium">

                        🟢 Lunas

                    </span>

                @else

                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full font-medium">

                        🔴 Ditolak

                    </span>

                @endif

            </div>


            {{-- ========================================================= --}}
{{-- ALASAN PENOLAKAN --}}
{{-- ========================================================= --}}

@if($order->status_pembayaran == 'Ditolak')

<div class="mt-6">

    <div class="bg-red-50 border-l-4 border-red-600 rounded-lg p-5">

        <h3 class="font-bold text-red-700 mb-2">

            Alasan Penolakan

        </h3>

        <p class="text-gray-700">

            {{ $order->alasan_penolakan }}

        </p>

    </div>

</div>

@endif

            {{-- Status Pesanan --}}
            <div>

                <p class="text-gray-500 mb-2">

                    Status Pesanan

                </p>

                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-medium">

                    {{ $order->status_pesanan }}

                </span>

            </div>

        </div>

    </div>

 {{-- ========================================================= --}}
{{-- AKSI ADMIN --}}
{{-- ========================================================= --}}

<div class="bg-white rounded-2xl shadow border p-6">

    <h2 class="text-xl font-bold mb-6">

        Aksi Admin

    </h2>

    {{-- ========================================= --}}
    {{-- MENUNGGU VERIFIKASI PEMBAYARAN --}}
    {{-- ========================================= --}}
    @if($order->status_pembayaran == 'Menunggu Verifikasi')

    <div class="flex flex-wrap gap-4">

        {{-- Verifikasi --}}
        <form
            action="{{ route('transaksi.verifikasi',$order) }}"
            method="POST">

            @csrf
            @method('PUT')

            <button
                type="submit"
                onclick="return confirm('Verifikasi pembayaran ini?')"
                class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                ✓ Verifikasi Pembayaran

            </button>

        </form>

        {{-- Tombol Tolak --}}
        <button
            type="button"
            onclick="document.getElementById('formTolak').classList.toggle('hidden')"
            class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">

            ✕ Tolak Pembayaran

        </button>

    </div>

    {{-- Form Penolakan --}}
    <div
        id="formTolak"
        class="hidden mt-6">

        <form
            action="{{ route('transaksi.tolak',$order) }}"
            method="POST">

            @csrf
            @method('PUT')

            <label class="block font-semibold mb-2">

                Alasan Penolakan

            </label>

            <textarea
                name="alasan_penolakan"
                rows="4"
                required
                class="w-full border rounded-lg p-4"
                placeholder="Contoh: Bukti transfer tidak jelas, nominal tidak sesuai, rekening tujuan berbeda, dll."></textarea>

            <div class="flex gap-3 mt-4">

                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg">

                    Simpan Penolakan

                </button>

                <button
                    type="button"
                    onclick="document.getElementById('formTolak').classList.add('hidden')"
                    class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-lg">

                    Batal

                </button>

            </div>

        </form>

    </div>

    {{-- ========================================= --}}
    {{-- SUDAH LUNAS -> MENUNGGU DIPROSES --}}
    {{-- ========================================= --}}
    @elseif(
        $order->status_pembayaran == 'Lunas'
        &&
        $order->status_pesanan == 'Menunggu'
    )

    <form
        action="{{ route('transaksi.proses',$order) }}"
        method="POST">

        @csrf
        @method('PUT')

        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

            📦 Proses Pesanan

        </button>

    </form>

    {{-- ========================================= --}}
    {{-- DIPROSES --}}
    {{-- ========================================= --}}
    @elseif($order->status_pesanan == 'Diproses')

    <form
        action="{{ route('transaksi.kirim',$order) }}"
        method="POST">

        @csrf
        @method('PUT')

        <button
    type="submit"
    class="bg-blue-600 text-white p-4 rounded">

    🚚 Kirim Pesanan

</button>

    </form>

    {{-- ========================================= --}}
    {{-- DIKIRIM --}}
    {{-- ========================================= --}}
    @elseif($order->status_pesanan == 'Dikirim')

    <form
        action="{{ route('transaksi.selesai',$order) }}"
        method="POST">

        @csrf
        @method('PUT')

        <button
            type="submit"
            class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg">

            ✅ Selesaikan Pesanan

        </button>

    </form>

    {{-- ========================================= --}}
    {{-- SELESAI --}}
    {{-- ========================================= --}}
    @elseif($order->status_pesanan == 'Selesai')

    <div
        class="bg-green-100 border border-green-300 text-green-700 px-6 py-4 rounded-lg">

        🎉 Pesanan telah selesai.

    </div>

    {{-- ========================================= --}}
    {{-- DITOLAK --}}
    {{-- ========================================= --}}
    @elseif($order->status_pembayaran == 'Ditolak')

    <div
        class="bg-red-100 border border-red-300 text-red-700 px-6 py-4 rounded-lg">

        Menunggu customer mengupload ulang bukti pembayaran.

    </div>

    @endif

</div>

    {{-- ========================================================= --}}
    {{-- TOMBOL --}}
    {{-- ========================================================= --}}
    <div class="flex justify-between">

        <a
            href="{{ route('transaksi.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg">

            ← Kembali

        </a>

    </div>

</div>

@endsection