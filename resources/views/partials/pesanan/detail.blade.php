<div class="bg-white rounded-xl shadow-lg overflow-hidden">

    <div class="bg-green-700 text-white px-6 py-4 flex justify-between">

        <div>

            <h2 class="text-xl font-bold">

                {{ $order->kode_order }}

            </h2>

            <p class="text-green-100">

                {{ $order->created_at->format('d F Y H:i') }}

            </p>

        </div>

        <div>

            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full">

                {{ $order->status_pembayaran }}

            </span>

            {{-- ========================================================= --}}
{{-- ALASAN PENOLAKAN --}}
{{-- ========================================================= --}}

@if($order->status_pembayaran == 'Menunggu Verifikasi' || $order->status_pembayaran == 'Ditolak')
<div class="mt-6">

    <button
        onclick="document.getElementById('uploadUlang').classList.toggle('hidden')"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

        🔄 Upload Bukti Baru

    </button>

</div>

<div id="uploadUlang" class="hidden mt-6">

    <form
        action="{{ route('pesanan.upload-ulang', $order->id) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label class="block font-semibold mb-3">

            Upload Bukti Pembayaran Baru

        </label>

        <input
            type="file"
            name="bukti_pembayaran"
            required
            accept=".jpg,.jpeg,.png"
            class="w-full border rounded-lg p-3">

        <button
            type="submit"
            class="mt-5 bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

            Kirim Bukti Baru

        </button>

    </form>

</div>

<div class="mt-6">

    <div class="bg-red-50 border-l-4 border-red-600 rounded-lg p-5">

        <h3 class="font-bold text-red-700">

            Pembayaran Ditolak

        </h3>

        <p class="mt-3 text-gray-700">

            {{ $order->alasan_penolakan }}

        </p>

        <div class="mt-5">

            <p class="text-sm text-gray-500">

                Silakan upload kembali bukti pembayaran yang benar
                agar pesanan dapat diproses.

            </p>

        </div>

    </div>

</div>

@endif

        </div>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-2 gap-6 mb-8">

            <div>

                <h3 class="font-bold mb-2">

                    Data Pemesan

                </h3>

                <p>

                    {{ $order->nama_pemesan }}

                </p>

                <p>

                    {{ $order->telepon }}

                </p>

                <p>

                    {{ $order->alamat }}

                </p>

            </div>

            <div>

                <h3 class="font-bold mb-2">

                    Informasi Pembayaran

                </h3>

                <p>

                    {{ $order->metode_pembayaran }}

                </p>

                <p class="font-bold text-green-700 text-2xl">

                    Rp {{ number_format($order->total_harga,0,',','.') }}

                </p>

            </div>

        </div>

        <table class="w-full border">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3">

                        Jenis Kayu

                    </th>

                    <th class="p-3">

                        Harga

                    </th>

                    <th class="p-3">

                        Jumlah

                    </th>

                    <th class="p-3">

                        Subtotal

                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($order->orderItems as $item)

                <tr>

                    <td class="border p-3">

                        {{ $item->jenisKayu->jenis }}

                    </td>

                    <td class="border p-3 text-center">

                        Rp {{ number_format($item->harga,0,',','.') }}

                    </td>

                    <td class="border p-3 text-center">

                        {{ $item->jumlah }}

                    </td>

                    <td class="border p-3 text-center">

                        Rp {{ number_format($item->subtotal,0,',','.') }}

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <div class="mt-8 flex justify-end">

            <a
                href="{{ route('pesanan.index') }}"
                class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-lg">

                ← Kembali

            </a>

        </div>

    </div>

</div>