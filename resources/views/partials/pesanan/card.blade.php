<div class="bg-white rounded-xl shadow-lg overflow-hidden">

    <div class="bg-green-700 text-white px-6 py-4 flex justify-between items-center">

        <div>

            <h2 class="font-bold text-lg">

                {{ $order->kode_order }}

            </h2>

            <p class="text-sm text-green-100">

                {{ $order->created_at->format('d F Y H:i') }}

            </p>

        </div>

        <div>

            @php

                $warna = match($order->status_pembayaran){

                    'Belum Bayar' => 'bg-gray-100 text-gray-700',

                    'Menunggu Verifikasi' => 'bg-yellow-100 text-yellow-700',

                    'Lunas' => 'bg-green-100 text-green-700',

                    'Ditolak' => 'bg-red-100 text-red-700',

                    default => 'bg-gray-100 text-gray-700'

                };

            @endphp

            <span class="{{ $warna }} px-4 py-2 rounded-full font-semibold">

                {{ $order->status_pembayaran }}

            </span>

        </div>

    </div>

    <div class="p-6">

        <div class="grid md:grid-cols-3 gap-6">

            <div>

                <p class="text-gray-500 text-sm">

                    Total Pembayaran

                </p>

                <h3 class="text-2xl font-bold text-green-700">

                    Rp {{ number_format($order->total_harga,0,',','.') }}

                </h3>

            </div>

            <div>

                <p class="text-gray-500 text-sm">

                    Status Pesanan

                </p>

                <h3 class="font-bold">

                    {{ $order->status_pesanan }}

                </h3>

            </div>

            <div class="flex items-end">

                <a
                    href="{{ route('pesanan.show',$order) }}"
                    class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-lg">

                    Lihat Detail

                </a>

            </div>

        </div>

    </div>

</div>