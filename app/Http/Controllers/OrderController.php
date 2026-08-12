<?php

namespace App\Http\Controllers;

use App\Models\JenisKayu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * ==========================================================
     * HALAMAN PEMESANAN
     * ==========================================================
     */
    public function create(Request $request)
    {
        $ids = $request->jenis_kayu ?? [];

        $jenisKayu = JenisKayu::whereIn('id', $ids)->get();

        return view('pemesanan', [
            'title'      => 'Pemesanan Produk',
            'jenisKayu'  => $jenisKayu,
            'productId'  => $request->product_id,
        ]);
    }

    /**
     * ==========================================================
     * SIMPAN CHECKOUT KE SESSION
     * ==========================================================
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:100',
            'no_hp'      => 'required|string|max:20',
            'alamat'     => 'required|string',
            'jenis_kayu' => 'required|array',
            'jumlah'     => 'required|array',
        ]);

        Session::put('checkout', [
            'nama'       => $request->nama,
            'no_hp'      => $request->no_hp,
            'alamat'     => $request->alamat,
            'catatan'    => $request->catatan,
            'jenis_kayu' => $request->jenis_kayu,
            'jumlah'     => $request->jumlah,
        ]);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return redirect()->route('pembayaran');
    }

    /**
     * ==========================================================
     * PESANAN SAYA
     * ==========================================================
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pesanan.index', [
            'title'  => 'Pesanan Saya',
            'orders' => $orders,
        ]);
    }

    /**
     * ==========================================================
     * DETAIL PESANAN
     * ==========================================================
     */
    public function show(Order $order)
    {
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

        $order->load('orderItems.jenisKayu');

        return view('pesanan.show', [
            'title' => 'Detail Pesanan',
            'order' => $order,
        ]);
    }

    /**
     * ==========================================================
     * UPLOAD ULANG BUKTI PEMBAYARAN
     * ==========================================================
     */
    public function uploadUlang(Request $request, Order $order)
    {
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Hapus bukti lama
        if (
            $order->bukti_pembayaran &&
            Storage::disk('public')->exists($order->bukti_pembayaran)
        ) {
            Storage::disk('public')->delete($order->bukti_pembayaran);
        }

        // Upload bukti baru
        $path = $request->file('bukti_pembayaran')
            ->store('bukti-pembayaran', 'public');

        // Update data order
        $order->update([
            'bukti_pembayaran' => $path,
            'status_pembayaran' => 'Menunggu Verifikasi',
            'status_pesanan' => 'Menunggu',
            'alasan_penolakan' => null,
        ]);

        return redirect()
            ->route('pesanan.show', $order->id)
            ->with(
                'success',
                'Bukti pembayaran berhasil dikirim ulang dan sedang menunggu verifikasi admin.'
            );
    }
}