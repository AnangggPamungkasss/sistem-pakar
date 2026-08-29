<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gejala = [
            'Bengkak',
            'Kaku pada otot sekitar cedera',
            'Mati rasa',
            'Memar',
            'Nyeri tajam mendadak saat cedera terjadi',
            'Nyeri saat disentuh',
            'Nyeri saat menekuk',
            'Nyeri saat berjalan',
            'Nyeri saat berlari',
            'Nyeri saat melompat',
            'Nyeri saat duduk atau berdiri lama',
            'Nyeri saat membawa atau mengangkat beban',
            'Nyeri saat melakukan gerakan rotasi',
            'Nyeri saat mengangkat kaki',
            'Perubahan bentuk anatomi (bengkok atau posisi tidak normal)',
            'Sensasi panas atau terbakar pada area cedera',
            'Sulit berdiri atau berjalan',
            'Sulit menggerakan lutut',
            'Sulit menggerakan pergelangan kaki',
            'Sulit meluruskan kaki',
            'Sulit berdiri dari posisi jongkok',
            'sensasi goyah atau tidak stabil pada area cedera',
            'Tidak bisa berdiri saat terjadi cedera',
            'lutut terasa mengunci saat digerakan',
            'Terdengar bunyi saat digerakan',
            'Terasa tertarik di bagian belakang paha',
            'Terdengar bunyi tek atau pop saat cedera',
        ];

        foreach ($gejala as $index => $item) {
            DB::table('gejala')->insert([
                'kode_gejala' => 'G' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'nama_gejala' => $item,
                'gambar'=> null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
}
    }
}
