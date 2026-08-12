<aside class="w-72 bg-white border-r shadow-sm min-h-screen">

    <nav class="p-5">

        <ul class="space-y-2">

            {{-- Dashboard --}}
            <li>
                <a href="/admin"
                    class="{{ $title == 'Dashboard Admin'
                        ? 'bg-green-100 text-green-700 border-l-4 border-green-700 shadow-sm'
                        : 'text-gray-700 hover:bg-green-50 hover:text-green-700 hover:translate-x-2' }}
                    flex items-center gap-4 px-4 py-3 rounded-lg transition-all duration-300">

                    {{-- Home Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="w-7 h-7">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 12L12 3l9.75 9M4.5 10.5v9h5.25v-6h4.5v6h5.25v-9"/>
                    </svg>

                    <span class="font-medium">
                        Dashboard
                    </span>

                </a>
            </li>

            {{-- Data Produk --}}
            <a href="/admin/produk"
    class="{{ $title == 'Data Produk'
        ? 'bg-green-100 text-green-700 border-l-4 border-green-700'
        : 'hover:bg-green-50 hover:translate-x-1' }}
    flex items-center gap-3 px-4 py-3 rounded-lg transition duration-300">

    <!-- Icon -->

    <svg xmlns="http://www.w3.org/2000/svg"
        class="w-7 h-7"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="1.8">

        <path stroke-linecap="round"
            stroke-linejoin="round"
            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10" />

    </svg>

    <span class="font-medium">
        Data Produk
    </span>

</a>

            {{-- Data Pelanggan --}}
            <li>
               <a href="{{ route('pelanggan.index') }}"
                   class="{{ $title == 'Data Pelanggan'
    ? 'bg-green-100 text-green-700 border-l-4 border-green-700'
    : 'text-gray-700 hover:bg-green-50 hover:text-green-700 hover:translate-x-2' }}
flex items-center gap-4 px-4 py-3 rounded-lg transition-all duration-300"
                    text-gray-700
                    transition-all duration-300
                    hover:bg-green-50
                    hover:text-green-700
                    hover:translate-x-2">

                    {{-- Users Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="w-7 h-7">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 003.742-.479 3 3 0 00-4.682-2.72m.94 3.199v-.75A2.25 2.25 0 0015.75 15.75h-7.5A2.25 2.25 0 006 17.97v.75m12 0a9.094 9.094 0 01-12 0"/>
                    </svg>

                    <span class="font-medium">
                        Data Pelanggan
                    </span>

                </a>
            </li>

            {{-- Data Transaksi --}}
            <li>
                  <a href="{{ route('transaksi.index') }}"
    class="{{ $title == 'Data Transaksi'
        ? 'bg-green-100 text-green-700 border-l-4 border-green-700 shadow-sm'
        : 'text-gray-700 hover:bg-green-50 hover:text-green-700 hover:translate-x-2' }}
    flex items-center gap-4 px-4 py-3 rounded-lg transition-all duration-300">

             

                    {{-- Document Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="w-7 h-7">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.5 21a2.25 2.25 0 002.25-2.25V8.25L15 1.5H6.75A2.25 2.25 0 004.5 3.75v15A2.25 2.25 0 006.75 21h12.75z"/>
                    </svg>

                    <span class="font-medium">
                        Data Transaksi
                    </span>

                </a>
            </li>

            {{-- Laporan --}}
            <li>
              <a href="{{ route('laporan.index') }}"
    class="{{ $title == 'Laporan Penjualan'
        ? 'bg-green-100 text-green-700 border-l-4 border-green-700 shadow-sm'
        : 'text-gray-700 hover:bg-green-50 hover:text-green-700 hover:translate-x-2' }}
    flex items-center gap-4 px-4 py-3 rounded-lg transition-all duration-300">

                    {{-- Chart Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="w-7 h-7">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 3v18h18M8 16V9m5 7V5m5 11v-4"/>
                    </svg>

                    <span class="font-medium">
                        Laporan
                    </span>

                </a>
            </li>

        </ul>

        <hr class="my-8">


        <a href="{{ route('pengaturan.index') }}"
   class="{{ $title == 'Pengaturan Website'
        ? 'bg-green-100 text-green-700 border-l-4 border-green-700 shadow-sm'
        : 'text-gray-700 hover:bg-green-50 hover:text-green-700 hover:translate-x-2' }}
   flex items-center gap-4 px-4 py-3 rounded-lg transition-all duration-300">

    <svg xmlns="http://www.w3.org/2000/svg"
     class="w-7 h-7"
     fill="none"
     viewBox="0 0 24 24"
     stroke="currentColor"
     stroke-width="1.8">

    <path stroke-linecap="round"
          stroke-linejoin="round"
          d="M10.343 3.94c.09-.542.56-.94 1.117-.94h1.08c.557 0 1.027.398 1.117.94l.133.798a1.125 1.125 0 001.675.764l.695-.398a1.125 1.125 0 011.398.17l.764.764a1.125 1.125 0 01.17 1.398l-.398.695a1.125 1.125 0 00.764 1.675l.798.133c.542.09.94.56.94 1.117v1.08c0 .557-.398 1.027-.94 1.117l-.798.133a1.125 1.125 0 00-.764 1.675l.398.695a1.125 1.125 0 01-.17 1.398l-.764.764a1.125 1.125 0 01-1.398.17l-.695-.398a1.125 1.125 0 00-1.675.764l-.133.798c-.09.542-.56.94-1.117.94h-1.08c-.557 0-1.027-.398-1.117-.94l-.133-.798a1.125 1.125 0 00-1.675-.764l-.695.398a1.125 1.125 0 01-1.398-.17l-.764-.764a1.125 1.125 0 01-.17-1.398l.398-.695a1.125 1.125 0 00-.764-1.675l-.798-.133A1.125 1.125 0 013 13.54v-1.08c0-.557.398-1.027.94-1.117l.798-.133a1.125 1.125 0 00.764-1.675l-.398-.695a1.125 1.125 0 01.17-1.398l.764-.764a1.125 1.125 0 011.398-.17l.695.398a1.125 1.125 0 001.675-.764l.133-.798z"/>

    <path stroke-linecap="round"
          stroke-linejoin="round"
          d="M12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"/>
</svg>

    <span class="font-medium">

        Pengaturan Website

    </span>

</a>



        {{-- Logout --}}
        <a href="/login"
            class="flex items-center gap-4 px-4 py-3 rounded-lg
            text-red-600
            transition-all duration-300
            hover:bg-red-50
            hover:translate-x-2">

            {{-- Logout Icon --}}
            <svg xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="w-7 h-7">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m-3-3h9m0 0l-3-3m3 3l-3 3"/>
            </svg>

            <span class="font-medium">
                Logout
            </span>

        </a>

    </nav>

</aside>