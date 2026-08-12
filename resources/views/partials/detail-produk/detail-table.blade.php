<section class="max-w-7xl mx-auto px-6 pb-16">

    {{-- Judul --}}
    <div class="mb-10">

        <h2 class="text-3xl font-bold text-gray-800">

            Pilihan Jenis Kayu

        </h2>

        <p class="text-gray-500 mt-2">

            Pilih satu atau lebih jenis kayu yang sesuai dengan kebutuhan Anda sebelum melanjutkan ke proses pemesanan.

        </p>

    </div>

    <form action="/pemesanan" method="GET" id="formPemesanan">

        <input
            type="hidden"
            name="product_id"
            value="{{ $product->id }}">

        {{-- Tabel --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-green-700 text-white">

                        <tr>

                            <th class="px-5 py-4">No</th>
                            <th class="px-5 py-4 text-left">Jenis Kayu</th>
                            <th class="px-5 py-4">Ukuran</th>
                            <th class="px-5 py-4">Satuan</th>
                            <th class="px-5 py-4">Harga</th>
                            <th class="px-5 py-4">Stok</th>
                            <th class="px-5 py-4">Status</th>
                            <th class="px-5 py-4">Pilih</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($product->jenisKayu as $jenis)

                        <tr class="border-b hover:bg-green-50 transition">

                            <td class="text-center py-5">

                                {{ $loop->iteration }}

                            </td>

                            <td class="px-5 font-semibold text-gray-800">

                                {{ $jenis->jenis }}

                            </td>

                            <td class="text-center">

                                {{ $jenis->ukuran }}

                            </td>

                            <td class="text-center">

                                {{ $jenis->satuan }}

                            </td>

                            <td class="text-center">

                                <span class="inline-flex px-4 py-2 rounded-full bg-green-100 text-green-700 font-bold">

                                    Rp {{ number_format($jenis->harga,0,',','.') }}

                                </span>

                            </td>

                            <td class="text-center">

                                {{ $jenis->stok }}

                            </td>

                            <td class="text-center">

                                @if($jenis->status == 'Aktif')

                                    <span class="inline-flex px-4 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                                        Aktif

                                    </span>

                                @else

                                    <span class="inline-flex px-4 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                                        Habis

                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                @if($jenis->status == 'Aktif')

                                    <input
                                        type="checkbox"
                                        name="jenis_kayu[]"
                                        value="{{ $jenis->id }}"
                                        class="w-5 h-5 rounded border-gray-300 text-green-700 focus:ring-green-600">

                                @else

                                    <input
                                        type="checkbox"
                                        disabled
                                        class="w-5 h-5 opacity-40">

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8" class="py-12 text-center text-gray-500">

                                Belum ada jenis kayu.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        {{-- Informasi --}}
        <div class="mt-8 bg-amber-50 border border-amber-200 rounded-2xl p-6">

            <h3 class="text-xl font-bold text-amber-800 mb-5">

                Informasi Pemesanan

            </h3>

            <ul class="space-y-4">

                <li class="flex items-start">

                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500 mt-2 mr-3 flex-shrink-0"></span>

                    <span class="text-gray-700 leading-7">

                        Pilih <strong>satu atau lebih jenis kayu</strong> sesuai kebutuhan Anda.

                    </span>

                </li>

                <li class="flex items-start">

                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500 mt-2 mr-3 flex-shrink-0"></span>

                    <span class="text-gray-700 leading-7">

                        Setelah menekan tombol <strong>Pesan Sekarang</strong>, Anda akan diarahkan ke halaman Pemesanan.

                    </span>

                </li>

                <li class="flex items-start">

                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500 mt-2 mr-3 flex-shrink-0"></span>

                    <span class="text-gray-700 leading-7">

                        Pada halaman berikutnya Anda dapat menentukan jumlah pembelian untuk setiap jenis kayu yang dipilih.

                    </span>

                </li>

            </ul>

        </div>

        {{-- Tombol --}}
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 mt-8">

            <div class="flex justify-end">

                <button
                    type="submit"
                    class="bg-green-700 hover:bg-green-800 text-white px-10 py-3 rounded-xl font-semibold shadow-md transition">

                    Pesan Sekarang

                </button>

            </div>

        </div>

    </form>

    <script>

const form = document.getElementById('formPemesanan');

form.addEventListener('submit', function(e){

    const checked = document.querySelectorAll(
        'input[name="jenis_kayu[]"]:checked'
    );

    if(checked.length < 1){

        e.preventDefault();
        e.stopPropagation();

       Swal.fire({
    icon: 'warning',
    title: 'Jenis Kayu Belum Dipilih',
    html: `
        <p>Silakan pilih <strong>minimal satu jenis kayu</strong> sebelum melanjutkan ke proses pemesanan.</p>
    `,
    confirmButtonText: 'Mengerti',
    confirmButtonColor: '#15803d',
    allowOutsideClick: false
});

        return false;
    }

});

</script>

</section>