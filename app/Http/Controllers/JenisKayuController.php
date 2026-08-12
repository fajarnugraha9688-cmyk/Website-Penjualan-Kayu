<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\JenisKayu;
use Illuminate\Http\Request;

class JenisKayuController extends Controller
{
    /**
     * ==========================================================
     * MENAMPILKAN DAFTAR JENIS KAYU
     * Dashboard -> Produk -> Kelola Jenis Kayu
     * ==========================================================
     */
    public function index(Product $product)
    {
        $jenisKayus = $product->jenisKayu;

        return view('admin.jenis-kayu.index', [
            'title'      => 'Kelola Jenis Kayu',
            'product'    => $product,
            'jenisKayus' => $jenisKayus,
        ]);
    }

    /**
     * ==========================================================
     * FORM TAMBAH JENIS KAYU
     * ==========================================================
     */
    public function create(Product $product)
    {
        return view('admin.jenis-kayu.create', [
            'title'   => 'Tambah Jenis Kayu',
            'product' => $product,
        ]);
    }

    /**
     * ==========================================================
     * SIMPAN JENIS KAYU
     * ==========================================================
     */
    public function store(Request $request, Product $product)
    {
        // Validasi
        $request->validate([
            'jenis'   => 'required|max:100',
            'ukuran'  => 'required|max:100',
            'satuan'  => 'required',
            'harga'   => 'required|numeric',
            'stok'    => 'required|integer',
            'status'  => 'required',
        ]);

        // Simpan Data
        JenisKayu::create([
            'product_id' => $product->id,
            'jenis'      => $request->jenis,
            'ukuran'     => $request->ukuran,
            'satuan'     => $request->satuan,
            'harga'      => $request->harga,
            'stok'       => $request->stok,
            'status'     => $request->status,
        ]);

        return redirect()
            ->route('jenis-kayu.index', $product->id)
            ->with('success', 'Jenis Kayu berhasil ditambahkan.');
    }

    /**
     * ==========================================================
     * FORM EDIT JENIS KAYU
     * ==========================================================
     */
    public function edit(Product $product, JenisKayu $jenisKayu)
    {
        return view('admin.jenis-kayu.edit', [
            'title'     => 'Edit Jenis Kayu',
            'product'   => $product,
            'jenisKayu' => $jenisKayu,
        ]);
    }

   /**
 * ==========================================================
 * UPDATE JENIS KAYU
 * ==========================================================
 */
public function update(Request $request, Product $product, JenisKayu $jenisKayu)
{
    // ======================================================
    // VALIDASI DATA
    // ======================================================

    $request->validate([

        'jenis'   => 'required|max:100',

        'ukuran'  => 'required|max:100',

        'satuan'  => 'required',

        'harga'   => 'required|numeric',

        'stok'    => 'required|integer',

        'status'  => 'required',

    ]);

    // ======================================================
    // UPDATE DATA
    // ======================================================

    $jenisKayu->update([

        'jenis'   => $request->jenis,

        'ukuran'  => $request->ukuran,

        'satuan'  => $request->satuan,

        'harga'   => $request->harga,

        'stok'    => $request->stok,

        'status'  => $request->status,

    ]);

    // ======================================================
    // KEMBALI KE HALAMAN DAFTAR JENIS KAYU
    // ======================================================

    return redirect()
        ->route('jenis-kayu.index', $product->id)
        ->with('success', 'Jenis Kayu berhasil diperbarui.');
}
/**
 * ==========================================================
 * HAPUS JENIS KAYU
 *
 * Fungsi :
 * Menghapus satu data Jenis Kayu berdasarkan ID.
 * Setelah berhasil akan kembali ke halaman
 * Kelola Jenis Kayu.
 * ==========================================================
 */
public function destroy(Product $product, JenisKayu $jenisKayu)
{
    // Hapus data
    $jenisKayu->delete();

    // Kembali ke halaman daftar Jenis Kayu
    return redirect()
        ->route('jenis-kayu.index', $product->id)
        ->with('success', 'Jenis Kayu berhasil dihapus.');
}
}