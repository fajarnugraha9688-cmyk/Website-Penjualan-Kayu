<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * ==========================================================
     * FIELD YANG BOLEH DIISI
     * (Mass Assignment)
     * ==========================================================
     *
     * CATATAN :
     * Untuk sementara field kategori, ukuran, harga,
     * stok, satuan, dan status masih dipertahankan
     * agar CRUD Produk tetap berjalan.
     *
     * Setelah Modul Jenis Kayu selesai,
     * field tersebut akan dipindahkan ke tabel
     * jenis_kayus.
     *
     * ==========================================================
     */
    protected $fillable = [

    'nama_produk',

    'kategori',

    'ukuran',

    'satuan',

    'harga',

    'stok',

    'deskripsi',

    'gambar',

    'status',

    'unggulan',

    ];

    /**
     * ==========================================================
     * RELASI KE JENIS KAYU
     *
     * Satu Produk memiliki banyak Jenis Kayu.
     *
     * Contoh :
     *
     * Produk :
     * Kayu Jati
     *
     * Jenis :
     * - Balok
     * - Papan
     * - Kaso
     * ==========================================================
     */
    public function jenisKayu()
    {
        return $this->hasMany(JenisKayu::class);
    }
}