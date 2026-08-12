<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * ==========================================================
     * BERANDA
     * ==========================================================
     */
    public function index()
    {
        $produkUnggulan = Product::where('unggulan', true)
            ->where('status', 'Aktif')
            ->latest()
            ->take(3)
            ->get();

        return view('home', [
            'title' => 'Beranda',
            'produkUnggulan' => $produkUnggulan,
        ]);
    }

    /**
     * ==========================================================
     * HALAMAN PRODUK CUSTOMER
     * ==========================================================
     */
    public function produk()
    {
        $products = Product::withCount('jenisKayu')
            ->latest()
            ->get();

        return view('produk', [
            'title' => 'Produk',
            'products' => $products,
        ]);
    }

    /**
     * ==========================================================
     * DETAIL PRODUK
     * ==========================================================
     */
    public function detail($id)
    {
        $product = Product::with('jenisKayu')->findOrFail($id);

        return view('detail-produk', [
            'title' => 'Detail Produk',
            'product' => $product,
        ]);
    }

    /**
     * ==========================================================
     * TENTANG KAMI
     * ==========================================================
     */
    public function tentang()
    {
        return view('tentang-kami', [
            'title' => 'Tentang Kami',
        ]);
    }

    /**
     * ==========================================================
     * DASHBOARD ADMIN
     * ==========================================================
     */
    public function dashboard()
    {
        $totalProduk = Product::count();

        $totalCustomer = User::where('role', 'customer')->count();

        $totalTransaksi = Order::count();

        $menungguVerifikasi = Order::where(
            'status_pembayaran',
            'Menunggu Verifikasi'
        )->count();

        $diproses = Order::where(
            'status_pesanan',
            'Diproses'
        )->count();

        $dikirim = Order::where(
            'status_pesanan',
            'Dikirim'
        )->count();

        $selesai = Order::where(
            'status_pesanan',
            'Selesai'
        )->count();

        $totalPendapatan = Order::where(
            'status_pembayaran',
            'Lunas'
        )->sum('total_harga');

        $grafikPenjualan = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {

            $grafikPenjualan[] = Order::whereYear(
                'created_at',
                now()->year
            )
            ->whereMonth(
                'created_at',
                $bulan
            )
            ->count();
        }

        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',
            'totalProduk' => $totalProduk,
            'totalCustomer' => $totalCustomer,
            'totalTransaksi' => $totalTransaksi,
            'menungguVerifikasi' => $menungguVerifikasi,
            'diproses' => $diproses,
            'dikirim' => $dikirim,
            'selesai' => $selesai,
            'totalPendapatan' => $totalPendapatan,
            'grafikPenjualan' => $grafikPenjualan,
        ]);
    }
}