<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * ==========================================================
     * MEMBUAT TABEL JENIS KAYU
     *
     * Fungsi :
     * Menyimpan seluruh jenis kayu dari setiap produk.
     *
     * Contoh :
     * Produk : Kayu Jati
     *
     * Jenis :
     * - Balok
     * - Papan
     * - Kaso
     * ==========================================================
     */
    public function up(): void
    {
        Schema::create('jenis_kayus', function (Blueprint $table) {

            // Primary Key
            $table->id();

            // Relasi ke tabel products
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->onDelete('cascade');

            // Jenis Kayu
            // Contoh : Balok, Papan, Kaso
            $table->string('jenis');

            // Ukuran Kayu
            // Contoh : 5x7x400
            $table->string('ukuran');

            // Satuan
            // Batang / Lembar
            $table->string('satuan');

            // Harga
            $table->decimal('harga',15,2);

            // Stok
            $table->integer('stok');

            // Status
            $table->enum('status',['Aktif','Habis'])
                  ->default('Aktif');

            // Timestamp
            $table->timestamps();

        });
    }

    /**
     * ==========================================================
     * MENGHAPUS TABEL JENIS KAYU
     * ==========================================================
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_kayus');
    }
};