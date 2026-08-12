@extends('layouts.app')

@section('content')

<section class="bg-gray-50 min-h-screen py-12">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-10">

            <h1 class="text-4xl font-bold text-gray-800">

                Pemesanan Produk

            </h1>

            <p class="text-gray-500 mt-3">

                Lengkapi data pesanan sebelum melanjutkan ke proses pembayaran.

            </p>

        </div>

        <form action="{{ route('pemesanan.store') }}" method="POST">

            @csrf

            @include('partials.pemesanan.ringkasan-produk')

            @include('partials.pemesanan.ringkasan-pembayaran')

            @include('partials.pemesanan.form-pemesanan')

            @include('partials.pemesanan.catatan')

            @include('partials.pemesanan.tombol')

        </form>

    </div>

</section>

@endsection

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const inputs = document.querySelectorAll('.jumlah');

    inputs.forEach(function (input) {

        input.addEventListener('input', function () {

            let jumlah = parseInt(this.value);
            let stok = parseInt(this.dataset.stok);

            if (isNaN(jumlah) || jumlah < 1) {
                jumlah = 1;
            }

            if (jumlah > stok) {
                jumlah = stok;
                alert('Jumlah pesanan melebihi stok yang tersedia.');
            }

            this.value = jumlah;

            hitungTotal();

        });

    });

    hitungTotal();

});

function hitungTotal() {

    let grandTotal = 0;
    let totalItem = 0;

    document.querySelectorAll('#tabelProduk tbody tr').forEach(function (row) {

        const hargaElement = row.querySelector('.harga');
        const jumlahElement = row.querySelector('.jumlah');
        const subtotalElement = row.querySelector('.subtotal');

        if (!hargaElement || !jumlahElement || !subtotalElement) {
            return;
        }

        const harga = parseInt(hargaElement.dataset.harga);
        const jumlah = parseInt(jumlahElement.value);

        const subtotal = harga * jumlah;

        subtotalElement.innerHTML =
            'Rp ' + subtotal.toLocaleString('id-ID');

        grandTotal += subtotal;
        totalItem += jumlah;

    });

    document.getElementById('grandTotal').innerHTML =
        'Rp ' + grandTotal.toLocaleString('id-ID');

    document.getElementById('totalItem').innerHTML =
        totalItem;

}

</script>

@endpush