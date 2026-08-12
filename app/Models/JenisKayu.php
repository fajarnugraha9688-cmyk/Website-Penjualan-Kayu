<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisKayu extends Model
{
    use HasFactory;

    /**
     * ==========================================================
     * NAMA TABEL
     * ==========================================================
     */
    protected $table = 'jenis_kayus';

    /**
     * ==========================================================
     * FIELD YANG BOLEH DIISI
     * ==========================================================
     */
    protected $fillable = [

        'product_id',

        'jenis',

        'ukuran',

        'satuan',

        'harga',

        'stok',

        'status',

    ];

    /**
     * ==========================================================
     * RELASI KE PRODUCT
     *
     * Setiap Jenis Kayu dimiliki oleh
     * satu Produk.
     * ==========================================================
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * ==========================================================
     * RELASI KE ORDER ITEM
     *
     * Satu Jenis Kayu dapat muncul
     * di banyak detail pesanan.
     * ==========================================================
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}