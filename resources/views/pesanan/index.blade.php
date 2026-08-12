@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-10">

    <h1 class="text-4xl font-bold mb-2">

        Pesanan Saya

    </h1>

    <p class="text-gray-600 mb-8">

        Daftar seluruh transaksi yang pernah Anda lakukan.

    </p>

    @if($orders->count())

        <div class="space-y-6">

            @foreach($orders as $order)

                @include('partials.pesanan.card')

            @endforeach

        </div>

    @else

        <div class="bg-white rounded-xl shadow-lg p-12 text-center">

            <div class="text-6xl mb-4">

                📦

            </div>

            <h2 class="text-2xl font-bold mb-3">

                Belum Ada Pesanan

            </h2>

            <p class="text-gray-500 mb-6">

                Anda belum pernah melakukan transaksi.

            </p>

            <a href="/produk"
                class="bg-green-700 hover:bg-green-800 text-white px-8 py-3 rounded-lg">

                Mulai Belanja

            </a>

        </div>

    @endif

</section>

@endsection