{{-- ======================================================
UPLOAD BUKTI PEMBAYARAN
====================================================== --}}

<div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden mb-8">

    {{-- Header --}}
    <div class="bg-green-700 px-8 py-5">

        <h2 class="text-2xl font-bold text-white">

            Upload Bukti Pembayaran

        </h2>

        <p class="text-green-100 text-sm mt-1">

            Unggah bukti transfer untuk proses verifikasi pembayaran oleh admin.

        </p>

    </div>

    <div class="p-8">

        <label class="block text-sm font-semibold text-gray-700 mb-3">

            Bukti Transfer

        </label>

        <input
            type="file"
            name="bukti_pembayaran"
            accept=".jpg,.jpeg,.png"
            class="block w-full rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 px-4 py-4 text-gray-700
                   file:mr-4 file:rounded-lg file:border-0 file:bg-green-700 file:px-5 file:py-2
                   file:text-sm file:font-semibold file:text-white hover:file:bg-green-800
                   cursor-pointer transition">
                    @error('bukti_pembayaran')@enderror
                    @error('bukti_pembayaran')
    <p class="mt-2 text-sm text-red-600">
        {{ $message }}
    </p>
@enderror

        <div class="mt-5 rounded-xl border border-blue-200 bg-blue-50 p-4">

            <h4 class="font-semibold text-blue-700 mb-2">

                Ketentuan Upload

            </h4>

            <ul class="text-sm text-gray-700 space-y-2 leading-6 list-disc pl-5">

                <li>Format file yang diperbolehkan: <strong>JPG, JPEG, dan PNG</strong>.</li>

                <li>Ukuran maksimum file adalah <strong>2 MB</strong>.</li>

                <li>Pastikan bukti transfer terlihat jelas agar proses verifikasi lebih cepat.</li>

            </ul>

        </div>

    </div>

</div>