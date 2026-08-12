<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * ==========================================================
     * MASS ASSIGNMENT
     * ==========================================================
     */
    protected $fillable = [

        'user_id',

        'kode_order',

        'nama_pemesan',

        'telepon',

        'alamat',

        'catatan',

        'total_harga',

        'metode_pembayaran',

        'bukti_pembayaran',

        'status_pembayaran',

        'status_pesanan',

        'alasan_penolakan',

    ];

    /**
     * ==========================================================
     * RELASI KE USER
     * ==========================================================
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ==========================================================
     * RELASI KE DETAIL PESANAN
     * ==========================================================
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}