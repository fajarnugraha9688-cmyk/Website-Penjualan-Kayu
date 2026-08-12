<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /**
     * ==========================================================
     * HALAMAN LAPORAN PENJUALAN
     * ==========================================================
     */
    public function index(Request $request)
    {
        $query = Order::query();

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        if ($request->filled('tanggal_awal')) {

            $query->whereDate(
                'created_at',
                '>=',
                $request->tanggal_awal
            );

        }

        if ($request->filled('tanggal_akhir')) {

            $query->whereDate(
                'created_at',
                '<=',
                $request->tanggal_akhir
            );

        }

        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'status_pesanan',
                $request->status
            );

        }

        $orders = $query
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | RINGKASAN LAPORAN
        |--------------------------------------------------------------------------
        */

        $totalTransaksi = $orders->count();

        $totalPendapatan = $orders
            ->where('status_pembayaran', 'Lunas')
            ->sum('total_harga');

        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN HALAMAN LAPORAN
        |--------------------------------------------------------------------------
        */

        return view('admin.laporan.index', [

            'title' => 'Laporan Penjualan',

            'orders' => $orders,

            'totalTransaksi' => $totalTransaksi,

            'totalPendapatan' => $totalPendapatan,

        ]);
    }

    /**
 * ==========================================================
 * EXPORT PDF
 * ==========================================================
 */
public function exportPdf(Request $request)
{

    $query = Order::query();

    if ($request->filled('tanggal_awal')) {

        $query->whereDate(
            'created_at',
            '>=',
            $request->tanggal_awal
        );

    }

    if ($request->filled('tanggal_akhir')) {

        $query->whereDate(
            'created_at',
            '<=',
            $request->tanggal_akhir
        );

    }

    if ($request->filled('status')) {

        $query->where(
            'status_pesanan',
            $request->status
        );

    }

    $orders = $query
        ->latest()
        ->get();

    $totalPendapatan = $orders
        ->where('status_pembayaran', 'Lunas')
        ->sum('total_harga');

    $pdf = Pdf::loadView(
        'admin.laporan.pdf',
        [

            'orders' => $orders,

            'totalPendapatan' => $totalPendapatan,

        ]
    );

    return $pdf->download('Laporan-Penjualan.pdf');

}
}