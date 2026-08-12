<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * ==========================================================
     * DATA TRANSAKSI
     * ==========================================================
     */
    public function index()
    {
        $orders = Order::with([
                'user',
                'orderItems.jenisKayu'
            ])
            ->latest()
            ->get();

        return view('admin.transaksi.index', [

            'title'  => 'Data Transaksi',

            'orders' => $orders

        ]);
    }

    /**
     * ==========================================================
     * DETAIL TRANSAKSI
     * ==========================================================
     */
    public function show(Order $order)
    {
        $order->load([

            'user',

            'orderItems.jenisKayu'

        ]);

        return view('admin.transaksi.show', [

            'title' => 'Detail Transaksi',

            'order' => $order

        ]);
    }

    /**
     * ==========================================================
     * VERIFIKASI PEMBAYARAN
     * ==========================================================
     *
     * Ketika pembayaran diverifikasi:
     * - Status Pembayaran = Lunas
     * - Status Pesanan    = Diproses
     * - Alasan Penolakan  = dikosongkan
     *
     * ==========================================================
     */
    public function verifikasi(Order $order)
    {
        $order->update([

    'status_pembayaran' => 'Lunas',

    // Belum diproses
    'status_pesanan' => 'Menunggu',

    'alasan_penolakan' => null,

]);

        return redirect()
            ->route('transaksi.show', $order)
            ->with(
                'success',
                'Pembayaran berhasil diverifikasi.'
            );
            }
        /**
     * ==========================================================
     * TOLAK PEMBAYARAN
     * ==========================================================
     *
     * Pembayaran ditolak BUKAN berarti pesanan dibatalkan.
     * Customer masih diberi kesempatan untuk upload ulang
     * bukti pembayaran.
     *
     * ==========================================================
     */
    public function tolak(Request $request, Order $order)
    {
        $request->validate([

            'alasan_penolakan' => 'required|string|max:500',

        ], [

            'alasan_penolakan.required' => 'Alasan penolakan wajib diisi.',

            'alasan_penolakan.max' => 'Alasan maksimal 500 karakter.',

        ]);

        $order->update([

            'status_pembayaran' => 'Ditolak',

            // BUKAN Dibatalkan
            'status_pesanan'    => 'Menunggu',

            'alasan_penolakan'  => $request->alasan_penolakan,

        ]);

        return redirect()
            ->route('transaksi.show', $order)
            ->with(
                'success',
                'Pembayaran berhasil ditolak.'
            );
    }



    /**
 * ==========================================================
 * PROSES PESANAN
 * ==========================================================
 */
public function proses(Order $order)
{
    // Hanya pesanan yang sudah lunas yang bisa diproses
    if ($order->status_pembayaran != 'Lunas') {

        return back()->with(
            'error',
            'Pesanan belum dapat diproses karena pembayaran belum lunas.'
        );

    }

    $order->update([

        'status_pesanan' => 'Diproses'

    ]);

    return back()->with(
        'success',
        'Pesanan berhasil diproses.'
    );
}

/**
 * ==========================================================
 * KIRIM PESANAN
 * ==========================================================
 */
public function kirim(Order $order)
{
    if ($order->status_pesanan != 'Diproses') {

        return back()->with(
            'error',
            'Pesanan harus diproses terlebih dahulu.'
        );

    }

    $order->update([

        'status_pesanan' => 'Dikirim'

    ]);

    return back()->with(
        'success',
        'Pesanan berhasil dikirim.'
    );
}

/**
 * ==========================================================
 * SELESAIKAN PESANAN
 * ==========================================================
 */
public function selesai(Order $order)
{
    if ($order->status_pesanan != 'Dikirim') {

        return back()->with(
            'error',
            'Pesanan belum dapat diselesaikan.'
        );

    }

    $order->update([

        'status_pesanan' => 'Selesai'

    ]);

    return back()->with(
        'success',
        'Pesanan telah selesai.'
    );
}

    /**
     * ==========================================================
     * FORM ALASAN PENOLAKAN
     * ==========================================================
     */
    public function formTolak(Order $order)
    {
        $order->load([

            'user',

            'orderItems.jenisKayu'

        ]);

        return view('admin.transaksi.tolak', [

            'title' => 'Alasan Penolakan',

            'order' => $order,

        ]);
    }
}