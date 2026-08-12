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
        Schema::create('settings', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | PRIMARY KEY
            |--------------------------------------------------------------------------
            */

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | HEADER WEBSITE
            |--------------------------------------------------------------------------
            */

            $table->string('logo')->nullable();

            $table->string('nama_perusahaan')->nullable();

            $table->string('tagline')->nullable();

            /*
            |--------------------------------------------------------------------------
            | BERANDA
            |--------------------------------------------------------------------------
            */

            $table->string('hero_judul')->nullable();

            $table->longText('hero_deskripsi')->nullable();

            $table->string('hero_banner')->nullable();

            /*
            |--------------------------------------------------------------------------
            | TENTANG KAMI
            |--------------------------------------------------------------------------
            */

            $table->string('tentang_judul')->nullable();

            $table->longText('tentang_deskripsi')->nullable();

            $table->longText('sejarah')->nullable();

            $table->longText('visi')->nullable();

            $table->longText('misi')->nullable();

            $table->longText('keunggulan')->nullable();

            $table->string('foto_tentang')->nullable();

            /*
            |--------------------------------------------------------------------------
            | KONTAK
            |--------------------------------------------------------------------------
            */

            $table->longText('alamat')->nullable();

            $table->string('telepon')->nullable();

            $table->string('whatsapp')->nullable();

            $table->string('email')->nullable();

            $table->string('instagram')->nullable();

            $table->string('facebook')->nullable();

            /*
            |--------------------------------------------------------------------------
            | PEMBAYARAN
            |--------------------------------------------------------------------------
            */

            $table->string('nama_bank')->nullable();

            $table->string('nomor_rekening')->nullable();

            $table->string('atas_nama')->nullable();

            /*
            |--------------------------------------------------------------------------
            | FOOTER
            |--------------------------------------------------------------------------
            */

            $table->longText('footer_deskripsi')->nullable();

            /*
            |--------------------------------------------------------------------------
            | TIMESTAMP
            |--------------------------------------------------------------------------
            */

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};