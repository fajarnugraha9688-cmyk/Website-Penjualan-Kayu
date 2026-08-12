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
        Schema::create('order_items', function (Blueprint $table) {

            $table->id();

            // Relasi ke tabel orders
            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();

            // Relasi ke tabel jenis_kayus
            $table->foreignId('jenis_kayu_id')
                ->constrained('jenis_kayus')
                ->cascadeOnDelete();

            // Jumlah yang dipesan
            $table->integer('jumlah');

            // Harga saat transaksi
            $table->decimal('harga', 15, 2);

            // Subtotal
            $table->decimal('subtotal', 15, 2);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};