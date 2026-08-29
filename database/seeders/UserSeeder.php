<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin123@gmail.com',
                'password' => Hash::make('admin123'),
                'role_id' => 1, // asumsi 1 = admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pasien',
                'email' => 'pasien123@gmail.com',
                'password' => Hash::make('pasien123'),
                'role_id' => 2, // asumsi 2 = pasien
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
