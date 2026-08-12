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
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            // Relasi ke user Laravel
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Kode transaksi
            $table->string('kode_order')->unique();

            // Data pemesan
            $table->string('nama_pemesan');
            $table->string('telepon');
            $table->text('alamat');
            $table->text('catatan')->nullable();

            // Total pembayaran
            $table->decimal('total_harga', 15, 2);

            // Pembayaran
            $table->string('metode_pembayaran')->default('Transfer Bank');
            $table->string('bukti_pembayaran')->nullable();

            // Status pembayaran
            $table->enum('status_pembayaran', [
                'Belum Bayar',
                'Menunggu Verifikasi',
                'Lunas',
                'Ditolak'
            ])->default('Belum Bayar');

            // Status pesanan
            $table->enum('status_pesanan', [
                'Menunggu',
                'Diproses',
                'Dikirim',
                'Selesai',
                'Dibatalkan'
            ])->default('Menunggu');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};