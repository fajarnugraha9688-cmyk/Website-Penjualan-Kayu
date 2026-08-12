<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [

        'order_id',
        'jenis_kayu_id',
        'jumlah',
        'harga',
        'subtotal',

    ];

    /**
     * Relasi ke Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relasi ke Jenis Kayu
     */
    public function jenisKayu()
    {
        return $this->belongsTo(JenisKayu::class);
    }

}