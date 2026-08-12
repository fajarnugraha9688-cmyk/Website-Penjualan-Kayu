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
        Schema::table('settings', function (Blueprint $table) {

            if (!Schema::hasColumn('settings', 'sejarah')) {
                $table->longText('sejarah')->nullable()->after('tentang_deskripsi');
            }

            if (!Schema::hasColumn('settings', 'keunggulan')) {
                $table->longText('keunggulan')->nullable()->after('misi');
            }

            if (!Schema::hasColumn('settings', 'footer_deskripsi')) {
                $table->longText('footer_deskripsi')->nullable()->after('atas_nama');
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            if (Schema::hasColumn('settings', 'footer_deskripsi')) {
                $table->dropColumn('footer_deskripsi');
            }

            if (Schema::hasColumn('settings', 'keunggulan')) {
                $table->dropColumn('keunggulan');
            }

            if (Schema::hasColumn('settings', 'sejarah')) {
                $table->dropColumn('sejarah');
            }

        });
    }
};