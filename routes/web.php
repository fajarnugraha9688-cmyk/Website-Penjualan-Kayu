<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JenisKayuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdminProfileController;
/*
|--------------------------------------------------------------------------
| WEBSITE CUSTOMER
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/produk', [HomeController::class, 'produk']);

Route::get('/produk/{id}', [HomeController::class, 'detail']);

Route::get('/tentang-kami', [HomeController::class, 'tentang']);

/*
|--------------------------------------------------------------------------
| PEMESANAN
|--------------------------------------------------------------------------
*/

Route::get('/pemesanan', [OrderController::class, 'create'])
    ->name('pemesanan');

Route::post('/pemesanan', [OrderController::class, 'store'])
    ->name('pemesanan.store');

/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->name('login.proses');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/register', [RegisterController::class, 'index'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

/*
|--------------------------------------------------------------------------
| PEMBAYARAN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/pembayaran', [PaymentController::class, 'index'])
        ->name('pembayaran');

    Route::post('/pembayaran', [PaymentController::class, 'store'])
        ->name('pembayaran.store');


/*
|--------------------------------------------------------------------------
| PROFIL CUSTOMER
|--------------------------------------------------------------------------
*/

Route::get(
    '/profil',
    [ProfileController::class, 'index']
)->name('profil.index');

Route::put(
    '/profil/update',
    [ProfileController::class, 'update']
)->name('profil.update');

Route::put(
    '/profil/foto',
    [ProfileController::class, 'updateFoto']
)->name('profil.foto');

Route::put(
    '/profil/password',
    [ProfileController::class, 'updatePassword'
])->name('profil.password');

            /*
    |--------------------------------------------------------------------------
    | PESANAN CUSTOMER
    |--------------------------------------------------------------------------
    */

    Route::get('/pesanan', [OrderController::class, 'index'])
        ->name('pesanan.index');

    Route::get('/pesanan/{order}', [OrderController::class, 'show'])
        ->name('pesanan.show');

    Route::put(
        '/pesanan/{order}/upload-ulang',
        [OrderController::class, 'uploadUlang']
    )->name('pesanan.upload-ulang');

}); // <-- Penutup middleware auth customer

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PROFIL ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/profil',
        [AdminProfileController::class, 'index']
    )->name('admin.profil');

    Route::put(
        '/admin/profil',
        [AdminProfileController::class, 'update']
    )->name('admin.profil.update');

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin',
        [HomeController::class, 'dashboard']
    )->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | DATA PELANGGAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/pelanggan',
        [CustomerController::class, 'index']
    )->name('pelanggan.index');

    Route::get(
        '/admin/pelanggan/{customer}',
        [CustomerController::class, 'show']
    )->name('pelanggan.show');

    /*
    |--------------------------------------------------------------------------
    | DATA PRODUK
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'admin/produk',
        ProductController::class
    )->names('produk');
    /*
    |--------------------------------------------------------------------------
    | PRODUK UNGGULAN
    |--------------------------------------------------------------------------
    */

    Route::put(
        '/admin/produk/{product}/unggulan',
        [ProductController::class, 'toggleUnggulan']
    )->name('produk.unggulan');

    /*
    |--------------------------------------------------------------------------
    | KELOLA JENIS KAYU
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/produk/{product}/jenis-kayu',
        [JenisKayuController::class, 'index']
    )->name('jenis-kayu.index');

    Route::get(
        '/admin/produk/{product}/jenis-kayu/create',
        [JenisKayuController::class, 'create']
    )->name('jenis-kayu.create');

    Route::post(
        '/admin/produk/{product}/jenis-kayu',
        [JenisKayuController::class, 'store']
    )->name('jenis-kayu.store');

    Route::get(
        '/admin/produk/{product}/jenis-kayu/{jenisKayu}/edit',
        [JenisKayuController::class, 'edit']
    )->name('jenis-kayu.edit');

    Route::put(
        '/admin/produk/{product}/jenis-kayu/{jenisKayu}',
        [JenisKayuController::class, 'update']
    )->name('jenis-kayu.update');

    Route::delete(
        '/admin/produk/{product}/jenis-kayu/{jenisKayu}',
        [JenisKayuController::class, 'destroy']
    )->name('jenis-kayu.destroy');

    /*
    |--------------------------------------------------------------------------
    | DATA TRANSAKSI
    |--------------------------------------------------------------------------
    */

    Route::prefix('admin/transaksi')->group(function () {

        Route::get(
            '/',
            [TransactionController::class, 'index']
        )->name('transaksi.index');

        Route::get(
            '/{order}',
            [TransactionController::class, 'show']
        )->name('transaksi.show');

        Route::put(
            '/{order}/verifikasi',
            [TransactionController::class, 'verifikasi']
        )->name('transaksi.verifikasi');

        Route::get(
            '/{order}/tolak',
            [TransactionController::class, 'formTolak']
        )->name('transaksi.form-tolak');

        Route::put(
            '/{order}/tolak',
            [TransactionController::class, 'tolak']
        )->name('transaksi.tolak');

        Route::put(
            '/{order}/proses',
            [TransactionController::class, 'proses']
        )->name('transaksi.proses');

        Route::put(
            '/{order}/kirim',
            [TransactionController::class, 'kirim']
        )->name('transaksi.kirim');

        Route::put(
            '/{order}/selesai',
            [TransactionController::class, 'selesai']
        )->name('transaksi.selesai');
    });

    /*
    |--------------------------------------------------------------------------
    | LAPORAN PENJUALAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/laporan',
        [ReportController::class, 'index']
    )->name('laporan.index');

    Route::get(
        '/admin/laporan/export-pdf',
        [ReportController::class, 'exportPdf']
    )->name('laporan.pdf');

    /*
    |--------------------------------------------------------------------------
    | PENGATURAN WEBSITE
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/pengaturan',
        [SettingController::class, 'index']
    )->name('pengaturan.index');

    Route::put(
        '/admin/pengaturan',
        [SettingController::class, 'update']
    )->name('pengaturan.update');

});