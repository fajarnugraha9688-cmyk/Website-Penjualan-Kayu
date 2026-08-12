<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('products', function (Blueprint $table) {

        $table->id();

        // Nama Produk
        $table->string('nama_produk');

        // Kategori
        $table->string('kategori');

        // Ukuran
        $table->string('ukuran');

        // Satuan
        $table->string('satuan');

        // Harga
        $table->decimal('harga', 15, 2);

        // Stok
        $table->integer('stok');

        // Deskripsi Produk
        $table->text('deskripsi');

        // Nama file gambar
        $table->string('gambar')->nullable();

        // Status Produk
        $table->enum('status', ['Aktif', 'Habis'])
              ->default('Aktif');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
