<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(

            [
                'email' => 'admin@mekarmandiri.com'
            ],

            [
                'name' => 'Administrator',
                'no_hp' => '081234567890',
                'alamat' => 'Mekar Mandiri',
                'role' => 'admin',
                'password' => Hash::make('admin123'),
            ]

        );
    }
}