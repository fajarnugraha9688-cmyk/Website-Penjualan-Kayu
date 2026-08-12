{{-- ====================================================== --}}
{{-- DATA PEMESAN --}}
{{-- ====================================================== --}}

<div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-8">

    {{-- Header --}}
    <div class="bg-green-700 px-8 py-5">

        <h2 class="text-2xl font-bold text-white">

            Data Pemesan

        </h2>

        <p class="text-green-100 text-sm mt-1">

            Lengkapi informasi pemesan agar proses konfirmasi dan pengiriman dapat dilakukan dengan benar.

        </p>

    </div>

    <div class="p-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Nama --}}
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">

                    Nama Lengkap
                    <span class="text-red-500">*</span>

                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama') }}"
                    required
                    placeholder="Masukkan nama lengkap"
                    class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 focus:border-green-600 focus:ring-2 focus:ring-green-600 transition">

                @error('nama')
                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Nomor HP --}}
            <div>

                <label class="block text-sm font-semibold text-gray-700 mb-2">

                    Nomor HP / WhatsApp
                    <span class="text-red-500">*</span>

                </label>

                <input
                    type="text"
                    name="no_hp"
                    value="{{ old('no_hp') }}"
                    required
                    placeholder="08xxxxxxxxxx"
                    class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 focus:border-green-600 focus:ring-2 focus:ring-green-600 transition">

                @error('no_hp')
                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Alamat --}}
            <div class="md:col-span-2">

                <label class="block text-sm font-semibold text-gray-700 mb-2">

                    Alamat Pengiriman
                    <span class="text-red-500">*</span>

                </label>

                <textarea
                    name="alamat"
                    rows="4"
                    required
                    placeholder="Masukkan alamat lengkap pengiriman"
                    class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 resize-none focus:border-green-600 focus:ring-2 focus:ring-green-600 transition">{{ old('alamat') }}</textarea>

                @error('alamat')
                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Catatan --}}
            <div class="md:col-span-2">

                <label class="block text-sm font-semibold text-gray-700 mb-2">

                    Catatan Tambahan

                    <span class="text-gray-400 font-normal">

                        (Opsional)

                    </span>

                </label>

                <textarea
                    name="catatan"
                    rows="3"
                    placeholder="Contoh: Pengiriman dilakukan pada jam kerja atau permintaan khusus lainnya."
                    class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 resize-none focus:border-green-600 focus:ring-2 focus:ring-green-600 transition">{{ old('catatan') }}</textarea>

            </div>

        </div>

        {{-- Informasi --}}
        <div class="mt-8 rounded-xl border border-blue-200 bg-blue-50 p-4">

            <p class="text-sm text-blue-700 leading-6">

                Pastikan nama, nomor telepon, dan alamat pengiriman telah diisi dengan benar agar proses konfirmasi dan pengiriman tidak mengalami kendala.

            </p>

        </div>

    </div>

</div>