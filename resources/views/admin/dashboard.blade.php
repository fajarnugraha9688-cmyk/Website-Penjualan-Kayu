@extends('layouts.admin')

@php
    use Carbon\Carbon;

    Carbon::setLocale('id');
@endphp

@section('content')

<div class="space-y-8">

    {{-- ====================================================== --}}
    {{-- HEADER DASHBOARD --}}
    {{-- ====================================================== --}}
    <div class="bg-white rounded-2xl shadow border p-8">

        <div class="flex flex-col lg:flex-row justify-between items-center gap-8">

            {{-- Kiri --}}
            <div>

                <p class="text-sm text-gray-500">

                    Dashboard Admin

                </p>

                <h1 class="text-4xl font-bold text-gray-800 mt-2">

                    👋 Selamat Datang, Admin

                </h1>

                <p class="text-gray-500 mt-3">

                    Selamat datang kembali di Sistem Informasi Penjualan
                    Mekar Mandiri.

                </p>

                <div class="flex flex-wrap gap-3 mt-6">

                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-medium">

                        📦 Produk : {{ $totalProduk }}

                    </span>

                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-medium">

                        👥 Customer : {{ $totalCustomer }}

                    </span>

                    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-medium">

                        💳 Transaksi : {{ $totalTransaksi }}

                    </span>

                </div>

            </div>

 {{-- ====================================================== --}}
{{-- INFORMASI HARI --}}
{{-- ====================================================== --}}

<div class="text-center">

    <p class="text-gray-500">

        Hari Ini

    </p>

    <h2 class="text-3xl font-bold mt-2">

        {{ Carbon::now()->locale('id')->translatedFormat('l') }}

    </h2>

    <p class="text-gray-500">

        {{ Carbon::now()->locale('id')->translatedFormat('d F Y') }}

    </p>

    <a
        href="{{ route('produk.index') }}"
        class="inline-block mt-5 bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg transition">

        Kelola Produk

    </a>

</div>

</div> {{-- END FLEX HEADER --}}

</div> {{-- END CARD WELCOME --}}

    {{-- ====================================================== --}}
    {{-- CARD STATISTIK --}}
    {{-- ====================================================== --}}

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Total Produk --}}
        <div class="bg-white rounded-xl shadow border p-6 hover:-translate-y-1 hover:shadow-lg transition">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">

                        Total Produk

                    </p>

                    <h2 class="text-5xl font-bold mt-2">

                        {{ $totalProduk }}

                    </h2>

                </div>

                <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center text-3xl">

                    📦

                </div>

            </div>

        </div>

        {{-- Total Customer --}}
        <div class="bg-white rounded-xl shadow border p-6 hover:-translate-y-1 hover:shadow-lg transition">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">

                        Total Customer

                    </p>

                    <h2 class="text-5xl font-bold mt-2">

                        {{ $totalCustomer }}

                    </h2>

                </div>

                <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center text-3xl">

                    👥

                </div>

            </div>

        </div>

        {{-- Total Transaksi --}}
        <div class="bg-white rounded-xl shadow border p-6 hover:-translate-y-1 hover:shadow-lg transition">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">

                        Total Transaksi

                    </p>

                    <h2 class="text-5xl font-bold mt-2">

                        {{ $totalTransaksi }}

                    </h2>

                </div>

                <div class="w-16 h-16 rounded-full bg-orange-100 flex items-center justify-center text-3xl">

                    💳

                </div>

            </div>

        </div>

        {{-- Menunggu Verifikasi --}}
        <div class="bg-white rounded-xl shadow border p-6 hover:-translate-y-1 hover:shadow-lg transition">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">

                        Menunggu Verifikasi

                    </p>

                    <h2 class="text-5xl font-bold mt-2">

                        {{ $menungguVerifikasi }}

                    </h2>

                </div>

                <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center text-3xl">

                    ⏳

                </div>

            </div>

        </div>

    </div>

        {{-- ====================================================== --}}
    {{-- CARD STATUS PESANAN --}}
    {{-- ====================================================== --}}

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Diproses --}}
        <div class="bg-white rounded-xl shadow border p-6 hover:-translate-y-1 hover:shadow-lg transition">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">

                        Diproses

                    </p>

                    <h2 class="text-5xl font-bold mt-2">

                        {{ $diproses }}

                    </h2>

                </div>

                <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center text-3xl">

                    📦

                </div>

            </div>

        </div>

        {{-- Dikirim --}}
        <div class="bg-white rounded-xl shadow border p-6 hover:-translate-y-1 hover:shadow-lg transition">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">

                        Dikirim

                    </p>

                    <h2 class="text-5xl font-bold mt-2">

                        {{ $dikirim }}

                    </h2>

                </div>

                <div class="w-16 h-16 rounded-full bg-indigo-100 flex items-center justify-center text-3xl">

                    🚚

                </div>

            </div>

        </div>

        {{-- Selesai --}}
        <div class="bg-white rounded-xl shadow border p-6 hover:-translate-y-1 hover:shadow-lg transition">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">

                        Selesai

                    </p>

                    <h2 class="text-5xl font-bold mt-2">

                        {{ $selesai }}

                    </h2>

                </div>

                <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center text-3xl">

                    ✅

                </div>

            </div>

        </div>

        {{-- Pendapatan --}}
        <div class="bg-white rounded-xl shadow border p-6 hover:-translate-y-1 hover:shadow-lg transition">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">

                        Total Pendapatan

                    </p>

                    <h2 class="text-2xl font-bold text-green-700 mt-3">

                        Rp {{ number_format($totalPendapatan,0,',','.') }}

                    </h2>

                </div>

                <div class="w-16 h-16 rounded-full bg-yellow-100 flex items-center justify-center text-3xl">

                    💰

                </div>

            </div>

        </div>

    </div>

    {{-- ====================================================== --}}
    {{-- GRAFIK & AKTIVITAS --}}
    {{-- ====================================================== --}}
<div class="bg-white rounded-xl shadow border p-6 xl:col-span-2">

    <h2 class="text-xl font-bold mb-5">

        Grafik Penjualan Bulanan

    </h2>

    <div style="height:350px;">

        <canvas id="grafikPenjualan"></canvas>

    </div>

</div>

        {{-- Aktivitas --}}
        <div class="bg-white rounded-xl shadow border p-6">

            <h2 class="text-xl font-bold text-gray-800 mb-5">

                Ringkasan Sistem

            </h2>

            <div class="space-y-4">

                <div class="flex justify-between">

                    <span>Total Produk</span>

                    <strong>{{ $totalProduk }}</strong>

                </div>

                <div class="flex justify-between">

                    <span>Total Customer</span>

                    <strong>{{ $totalCustomer }}</strong>

                </div>

                <div class="flex justify-between">

                    <span>Total Transaksi</span>

                    <strong>{{ $totalTransaksi }}</strong>

                </div>

                <div class="flex justify-between">

                    <span>Menunggu Verifikasi</span>

                    <strong>{{ $menungguVerifikasi }}</strong>

                </div>

                <div class="flex justify-between">

                    <span>Diproses</span>

                    <strong>{{ $diproses }}</strong>

                </div>

                <div class="flex justify-between">

                    <span>Dikirim</span>

                    <strong>{{ $dikirim }}</strong>

                </div>

                <div class="flex justify-between">

                    <span>Selesai</span>

                    <strong>{{ $selesai }}</strong>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

window.addEventListener('load', function () {

    const ctx = document.getElementById('grafikPenjualan');

    if (!ctx) return;

    new Chart(ctx, {

        type: 'bar',

        data: {

            labels: [
                'Jan','Feb','Mar','Apr','Mei','Jun',
                'Jul','Ags','Sep','Okt','Nov','Des'
            ],

            datasets: [{

                label: 'Jumlah Transaksi',

                data: @json($grafikPenjualan),

                backgroundColor: '#16a34a',

                borderRadius: 8

            }]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            scales: {

                y: {

                    beginAtZero: true

                }

            }

        }

    });

});

</script>

@endsection