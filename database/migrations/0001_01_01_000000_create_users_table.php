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
        // ==========================
        // Tabel Users
        // ==========================
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Informasi User
            $table->string('name');
            $table->string('email')->unique();
            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();

            // Hak Akses
            $table->enum('role', ['admin', 'customer'])
                  ->default('customer');

            // Verifikasi Email
            $table->timestamp('email_verified_at')->nullable();

            // Login
            $table->string('password');
            $table->rememberToken();

            // Waktu
            $table->timestamps();
        });

        // ==========================
        // Password Reset
        // ==========================
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // ==========================
        // Session
        // ==========================
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};