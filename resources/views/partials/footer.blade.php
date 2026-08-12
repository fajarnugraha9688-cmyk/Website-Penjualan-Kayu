<footer class="bg-green-900 text-white mt-20">

    <div class="max-w-7xl mx-auto px-8 py-12">

        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-10 items-start">

            {{-- ====================================================== --}}
            {{-- TENTANG PERUSAHAAN --}}
            {{-- ====================================================== --}}

            <div>

                <div class="flex items-center gap-4 mb-5">

                    @if($setting->logo)

                        <img
                            src="{{ asset('storage/' . $setting->logo) }}"
                            alt="{{ $setting->nama_perusahaan }}"
                            class="w-16 h-16 rounded-full object-cover border-2 border-white shadow">

                    @endif

                    <div>

                        <h2 class="text-3xl font-bold">

                            {{ $setting->nama_perusahaan }}

                        </h2>

                        <p class="text-green-200 text-sm">

                            {{ $setting->tagline }}

                        </p>

                    </div>

                </div>

                <p class="text-gray-300 leading-8 text-justify">

                    {{ $setting->footer_deskripsi }}

                </p>

            </div>

            {{-- ====================================================== --}}
            {{-- MENU --}}
            {{-- ====================================================== --}}

            <div class="flex flex-col items-center">

                <h2 class="text-2xl font-semibold mb-5">

                    Menu

                </h2>

                <ul class="space-y-3 text-center">

                    <li>

                        <a
                            href="/"
                            class="hover:text-yellow-300 transition duration-300">

                            Beranda

                        </a>

                    </li>

                    <li>

                        <a
                            href="/produk"
                            class="hover:text-yellow-300 transition duration-300">

                            Produk

                        </a>

                    </li>

                    <li>

                        <a
                            href="/tentang-kami"
                            class="hover:text-yellow-300 transition duration-300">

                            Tentang Kami

                        </a>

                    </li>

                </ul>

            </div>

            {{-- ====================================================== --}}
            {{-- HUBUNGI KAMI --}}
            {{-- ====================================================== --}}

            <div class="lg:pl-4">

                <h2 class="text-2xl font-semibold mb-5">

                    Hubungi Kami

                </h2>

                <div class="space-y-4 text-gray-300">

                    {{-- Alamat --}}
                    <div class="flex items-start gap-3">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 text-red-400 mt-1 flex-shrink-0"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0"/>

                        </svg>

                        <a
                            href="https://www.google.com/maps/search/?api=1&query={{ urlencode($setting->alamat) }}"
                            target="_blank"
                            class="hover:text-yellow-300 transition leading-7">

                            {{ $setting->alamat }}

                        </a>

                    </div>

                    {{-- WhatsApp --}}
                    <div class="flex items-center gap-3">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 text-green-400 flex-shrink-0"
                             fill="currentColor"
                             viewBox="0 0 24 24">

                            <path d="M20.52 3.48A11.81 11.81 0 0012.04 0C5.48 0 .12 5.36.12 11.92c0 2.1.55 4.16 1.6 5.98L0 24l6.28-1.65a11.9 11.9 0 005.76 1.47h.01c6.56 0 11.92-5.36 11.92-11.92a11.8 11.8 0 00-3.45-8.42zm-8.48 18.3a9.9 9.9 0 01-5.04-1.38l-.36-.21-3.73.98.99-3.63-.23-.37a9.9 9.9 0 01-1.52-5.26c0-5.46 4.44-9.9 9.9-9.9 2.64 0 5.12 1.03 6.98 2.89a9.8 9.8 0 012.9 6.98c0 5.46-4.44 9.9-9.89 9.9z"/>

                        </svg>

                        <a
                            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp) }}"
                            target="_blank"
                            class="hover:text-yellow-300 transition">

                            {{ $setting->whatsapp }}

                        </a>

                    </div>

                    {{-- Email --}}
                    <div class="flex items-center gap-3">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 text-blue-300 flex-shrink-0"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M3 8l9 6 9-6"/>

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M21 8v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8"/>

                        </svg>

                        <a
                            href="mailto:{{ $setting->email }}"
                            class="hover:text-yellow-300 transition">

                            {{ $setting->email }}

                        </a>

                    </div>

                </div>

            </div>

        </div>

          {{-- ====================================================== --}}
        {{-- COPYRIGHT --}}
        {{-- ====================================================== --}}

        <div class="border-t border-green-700 mt-12 pt-6">

            <div class="flex flex-col items-center gap-3">

                <p class="text-gray-300 text-sm text-center">

                    © {{ date('Y') }}

                    <span class="font-semibold text-white">

                        {{ $setting->nama_perusahaan }}

                    </span>

                    . All Rights Reserved.

                </p>

               

                </div>

            </div>

        </div>

    </div>

</footer>