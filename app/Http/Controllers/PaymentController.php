<?php

namespace App\Http\Controllers;

use App\Models\JenisKayu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Halaman Pembayaran
     */
    public function index()
    {
        $checkout = session('checkout');

        if (!$checkout) {

            return redirect('/produk')
                ->with('error', 'Silakan lakukan pemesanan terlebih dahulu.');

        }

        $jenisKayu = JenisKayu::whereIn(
            'id',
            $checkout['jenis_kayu']
        )->get();

        $grandTotal = 0;

        foreach ($jenisKayu as $item) {

            $jumlah = $checkout['jumlah'][$item->id];

            $grandTotal += $item->harga * $jumlah;

        }

        return view('pembayaran', [

            'title'       => 'Pembayaran',

            'checkout'    => $checkout,

            'jenisKayu'   => $jenisKayu,

            'grandTotal'  => $grandTotal,

        ]);
    }

    /**
     * Simpan Transaksi
     */
    public function store(Request $request)
    {
      $request->validate(
    [

        'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',

    ],
    [

        'bukti_pembayaran.required' => 'Silakan unggah bukti pembayaran terlebih dahulu.',

        'bukti_pembayaran.image' => 'File yang diunggah harus berupa gambar.',

        'bukti_pembayaran.mimes' => 'Format file harus JPG, JPEG, atau PNG.',

        'bukti_pembayaran.max' => 'Ukuran file maksimal 2 MB.',

    ]
);

        $checkout = session('checkout');

        if (!$checkout) {

            return redirect('/produk')
                ->with('error', 'Session checkout telah berakhir.');

        }

        $jenisKayu = JenisKayu::whereIn(
            'id',
            $checkout['jenis_kayu']
        )->get();

        $grandTotal = 0;

        foreach ($jenisKayu as $item) {

            $jumlah = $checkout['jumlah'][$item->id];

            $grandTotal += ($item->harga * $jumlah);

        }

        DB::beginTransaction();

        try {

            // Upload bukti pembayaran
            $path = $request
                ->file('bukti_pembayaran')
                ->store('bukti-pembayaran', 'public');

            // Generate kode order
            $kodeOrder = 'ORD-' . date('YmdHis') . rand(100, 999);

            // Simpan Order
            $order = Order::create([

                'user_id' => Auth::id(),

                'kode_order' => $kodeOrder,

                'nama_pemesan' => $checkout['nama'],

                'telepon' => $checkout['no_hp'],

                'alamat' => $checkout['alamat'],

                'catatan' => $checkout['catatan'] ?? null,

                'total_harga' => $grandTotal,

                'metode_pembayaran' => 'Transfer Bank',

                'bukti_pembayaran' => $path,

                'status_pembayaran' => 'Menunggu Verifikasi',

                'status_pesanan' => 'Menunggu',

            ]);

            // ============================
            // PART 2 DIMULAI DARI SINI
            // ============================

                        foreach ($jenisKayu as $item) {

                $jumlah = $checkout['jumlah'][$item->id];

                $subtotal = $item->harga * $jumlah;

                // Simpan detail pesanan
                OrderItem::create([

                    'order_id'      => $order->id,

                    'jenis_kayu_id' => $item->id,

                    'jumlah'        => $jumlah,

                    'harga'         => $item->harga,

                    'subtotal'      => $subtotal,

                ]);

                // Kurangi stok
                $item->decrement('stok', $jumlah);

            }

            DB::commit();

            // Hapus session checkout
            session()->forget('checkout');

            return redirect()
                ->route('pesanan.index')
                ->with('success', 'Pesanan berhasil dibuat dan sedang menunggu verifikasi pembayaran.');

        } catch (\Exception $e) {

            DB::rollBack();

            // Hapus file jika sudah terlanjur diupload
            if (isset($path) && Storage::disk('public')->exists($path)) {

                Storage::disk('public')->delete($path);

            }

            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan pesanan. ' . $e->getMessage());

        }

    }

}