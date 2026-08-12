@extends('layouts.app')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-10">

    <h1 class="text-4xl font-bold mb-2">

        Detail Pesanan

    </h1>

    <p class="text-gray-600 mb-8">

        Detail transaksi pelanggan.

    </p>

    @include('partials.pesanan.detail')

</section>

@endsection