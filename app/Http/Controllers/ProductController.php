<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar produk
     */
    public function index()
    {
       $products = Product::withCount('jenisKayu')
            ->latest()
            ->get();

        return view('admin.produk.index', [
            'title'    => 'Data Produk',
            'products' => $products
        ]);
    }

    /**
     * Menampilkan halaman tambah produk
     */
    public function create()
    {
        return view('admin.produk.create', [
            'title' => 'Tambah Produk'
        ]);
    }

    /**
     * Menyimpan produk baru
     */
    /**
 * ==========================================================
 * MENYIMPAN PRODUK BARU
 *
 * Produk yang dibuat di sini hanya menyimpan
 * informasi utama.
 *
 * Detail seperti:
 * - Harga
 * - Stok
 * - Ukuran
 * - Satuan
 * - Status
 *
 * akan ditambahkan melalui menu
 * Kelola Jenis Kayu.
 * ==========================================================
 */
public function store(Request $request)
{
    // ======================================================
    // VALIDASI
    // ======================================================

    $request->validate([

        'nama_produk' => 'required|max:255',

        'kategori'    => 'required',

        'deskripsi'   => 'required',

        'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        'unggulan'    => 'nullable|boolean',

    ]);

    // ======================================================
    // UPLOAD FOTO
    // ======================================================

    $gambar = null;

    if ($request->hasFile('gambar')) {

        $file = $request->file('gambar');

        $slug = strtolower(str_replace(' ', '-', $request->nama_produk));

        $namaFile = $slug . '-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();

        $gambar = $file->storeAs('produk', $namaFile, 'public');

    }

    // ======================================================
    // SIMPAN PRODUK
    // ======================================================

    $product = Product::create([

        'nama_produk' => $request->nama_produk,

        'kategori'    => $request->kategori,

        'deskripsi'   => $request->deskripsi,

        'gambar'      => $gambar,

        /*
        |------------------------------------------------------
        | Nilai Default
        |------------------------------------------------------
        | Sementara masih disimpan karena field masih ada
        | di tabel products.
        | Nantinya field ini akan dihapus saat refactor database.
        */

        'ukuran' => '-',

        'satuan' => '-',

        'harga' => 0,

        'stok' => 0,

        'status' => 'Aktif',

        'unggulan' => $request->has('unggulan'),

    ]);

    // ======================================================
    // ARAHKAN KE KELOLA JENIS
    // ======================================================

    return redirect()
        ->route('jenis-kayu.index', $product->id)
        ->with('success', 'Produk berhasil ditambahkan. Silakan tambahkan Jenis Kayu.');
}

    /**
     * Detail produk
     */
    public function show($id)
    {
        //
    }

    /**
     * Menampilkan form edit produk
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.produk.edit', [
            'title'   => 'Edit Produk',
            'product' => $product
        ]);
    }

  /**
 * ==========================================================
 * UPDATE PRODUK
 *
 * Produk hanya menyimpan informasi utama.
 * Detail seperti harga, stok, ukuran, satuan
 * dan status dikelola melalui Jenis Kayu.
 * ==========================================================
 */
public function update(Request $request, $id)
{
    // ======================================================
    // VALIDASI
    // ======================================================

    $request->validate([

        'nama_produk' => 'required|max:255',

        'kategori'    => 'required',

        'deskripsi'   => 'required',

        'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        'unggulan' => 'nullable|boolean',

    ]);

    // ======================================================
    // AMBIL DATA PRODUK
    // ======================================================

    $product = Product::findOrFail($id);

    // ======================================================
    // FOTO LAMA
    // ======================================================

    $gambar = $product->gambar;

    // ======================================================
    // JIKA FOTO DIGANTI
    // ======================================================

    if ($request->hasFile('gambar')) {

        // Hapus foto lama
        if ($gambar && Storage::disk('public')->exists($gambar)) {

            Storage::disk('public')->delete($gambar);

        }

        // Upload foto baru
        $file = $request->file('gambar');

        $slug = strtolower(str_replace(' ', '-', $request->nama_produk));

        $namaFile = $slug . '-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();

        $gambar = $file->storeAs('produk', $namaFile, 'public');
    }

    // ======================================================
    // UPDATE PRODUK
    // ======================================================

    $product->update([

        'nama_produk' => $request->nama_produk,

        'kategori'    => $request->kategori,

        'deskripsi'   => $request->deskripsi,

        'gambar'      => $gambar,

        'unggulan' => $request->has('unggulan'),

        /*
        |------------------------------------------------------
        | Nilai default tetap dipertahankan
        | sampai refactor database selesai.
        |------------------------------------------------------
        */

        'ukuran' => $product->ukuran,

        'satuan' => $product->satuan,

        'harga'  => $product->harga,

        'stok'   => $product->stok,

        'status' => $product->status,

    ]);

    // ======================================================
    // REDIRECT
    // ======================================================

    return redirect()
        ->route('produk.index')
        ->with('success', 'Produk berhasil diperbarui.');
}

    /**
     * Menghapus produk
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {

            Storage::disk('public')->delete($product->gambar);

        }

        $product->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    /**
 * ==========================================================
 * UBAH STATUS PRODUK UNGGULAN
 * ==========================================================
 */
public function toggleUnggulan(Product $product)
{
    $product->update([

        'unggulan' => !$product->unggulan

    ]);

    return back()->with(
        'success',
        'Status produk unggulan berhasil diperbarui.'
    );
}

}