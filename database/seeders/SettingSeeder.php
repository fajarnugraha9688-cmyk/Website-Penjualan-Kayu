<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(

            ['id' => 1],

            [

                /*
                |--------------------------------------------------------------------------
                | HEADER WEBSITE
                |--------------------------------------------------------------------------
                */

                'logo' => null,

                'nama_perusahaan' => 'Mekar Mandiri',

                'tagline' => 'Sistem Informasi Penjualan Kayu',

                /*
                |--------------------------------------------------------------------------
                | BERANDA
                |--------------------------------------------------------------------------
                */

                'hero_judul' => 'Selamat Datang di Mekar Mandiri',

                'hero_deskripsi' =>
                'Menyediakan berbagai produk kayu dan furniture berkualitas seperti meja, kursi, lemari, kusen, pintu, jendela, dan berbagai kebutuhan kayu lainnya.',

                'hero_banner' => null,

                /*
                |--------------------------------------------------------------------------
                | TENTANG KAMI
                |--------------------------------------------------------------------------
                */

                'tentang_judul' => 'Tentang Mekar Mandiri',

                'tentang_deskripsi' =>
                'Mekar Mandiri merupakan perusahaan yang bergerak di bidang penjualan kayu dan furniture berkualitas dengan mengutamakan kualitas produk serta kepuasan pelanggan.',

                'sejarah' =>
                'Mekar Mandiri berdiri pada tahun 2015 sebagai usaha penjualan kayu. Seiring berkembangnya usaha, sejak tahun 2020 perusahaan mulai memproduksi berbagai furniture seperti meja, kursi, lemari, kusen dan pintu.',

                'visi' =>
                'Menjadi perusahaan pengolahan kayu dan furniture yang terpercaya serta mampu bersaing di tingkat nasional.',

                'misi' =>
                "• Menyediakan produk kayu berkualitas.\n• Memberikan pelayanan terbaik kepada pelanggan.\n• Mengembangkan inovasi produk secara berkelanjutan.\n• Menjaga kepercayaan pelanggan.",

                'keunggulan' =>
                "• Kayu berkualitas.\n• Harga bersaing.\n• Pengerjaan rapi.\n• Pelayanan cepat.\n• Bisa menerima pesanan custom.",

                'foto_tentang' => null,

                /*
                |--------------------------------------------------------------------------
                | KONTAK
                |--------------------------------------------------------------------------
                */

                'alamat' => 'Dusun Cileuksa RT 03 RW 04',

                'telepon' => '081234567890',

                'whatsapp' => '081234567890',

                'email' => 'info@mekarmandiri.com',

                'instagram' => 'mekarmandiri',

                'facebook' => 'Mekar Mandiri',

                /*
                |--------------------------------------------------------------------------
                | PEMBAYARAN
                |--------------------------------------------------------------------------
                */

                'nama_bank' => 'Bank BCA',

                'nomor_rekening' => '1234567890',

                'atas_nama' => 'Mekar Mandiri',

                /*
                |--------------------------------------------------------------------------
                | FOOTER
                |--------------------------------------------------------------------------
                */

                'footer_deskripsi' =>
                'Mekar Mandiri adalah perusahaan yang bergerak di bidang penjualan kayu dan furniture berkualitas dengan mengutamakan kepuasan pelanggan.',

            ]

        );
    }
}