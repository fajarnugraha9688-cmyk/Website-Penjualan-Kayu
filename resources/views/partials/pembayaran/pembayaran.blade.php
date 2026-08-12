<form action="{{ route('pembayaran.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <section class="max-w-7xl mx-auto px-6 py-10">

        <h1 class="text-4xl font-bold text-center mb-10">

            Pembayaran

        </h1>

        {{-- Data Pemesan --}}
        @include('partials.pembayaran.data-pemesan')

        {{-- Ringkasan Pesanan --}}
        @include('partials.pembayaran.ringkasan-pesanan')

        {{-- Total Pembayaran --}}
        @include('partials.pembayaran.total-pembayaran')

        {{-- Informasi Rekening --}}
        @include('partials.pembayaran.rekening')

        {{-- Upload Bukti --}}
        @include('partials.pembayaran.upload-bukti')

        {{-- Catatan --}}
        @include('partials.pembayaran.catatan')

        {{-- Tombol --}}
        @include('partials.pembayaran.tombol')

    </section>

</form>