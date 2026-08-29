<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CederaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cedera = [
            [
                'kode_cedera' => 'C001',
                'nama_cedera' => 'Angkle',
                'penanganan' => [
                    'Istirahatkan pergelangan kaki dari aktivitas berat',
                    'Kompres pergelangan kaki menggunakan es selama 15-20 menit setiap 3 jam sekali pada 3 hari pertama setelah cedera',
                    'Posisikan kaki lebih tinggi dari jantung saat duduk atau tidur',
                    'Hindari menapakkan kaki yang cedera selama 24–48 jam pertama',
                    'Gunakan tongkat saat berjalan untuk mengurangi tekanan pada pergelangan kaki',
                    'Segera lakukan pemeriksaan MRI ke tenaga medis terdekat untuk mengetahui tingkat keparahan cedera',
                ],
            ],
            [
                'kode_cedera' => 'C002',
                'nama_cedera' => 'Anterior Cruciate Ligament (ACL)',
                'penanganan' => [
                    'Istirahatkan lutut dari aktivitas berat',
                    'Posisikan lutut lebih tinggi dari tubuh saat beristirahat',
                    'Kompres lutut menggunakan es selama 15-20 menit setiap 6 jam sekali pada 3 hari pertama setelah cedera',
                    'Hindari berlari dan melompat',
                    'Hindari memijat bagian lutut secara langsung',
                    'Hindari duduk dalam posisi lutut tertekuk dalam waktu lama',
                    'Gunakan tongkat bantu jika terasa nyeri saat berjalan',
                    'Segera lakukan pemeriksaan MRI ke tenaga medis terdekat untuk mengetahui tingkat keparahan cedera',
                ],
            ],
            [
                'kode_cedera' => 'C003',
                'nama_cedera' => 'Meniskus',
                'penanganan' => [
                    'Istirahatkan lutut dari segala aktivitas berat', 
                    'Kompres lutut menggunakan es selama 15-20 menit setiap 3 jam sekali pada 3 hari pertama setelah cedera',
                    'Hindari menekuk lutut terlalu dalam',
                    'Hindari duduk dengan lutut tertekuk',
                    'Hindari memijat bagian lutut secara langsung',
                    'Hindari aktivitas naik turun tangga secara berulang',
                    'Gunakan bantal pada bagian bawah lutut pada saat tidur',
                    'segera lakukan pemeriksaan mri ke tenaga medis terdekat untuk mengetahui tingkat keparahan cedera',
                ],
            ],
            [
                'kode_cedera' => 'C004',
                'nama_cedera' => 'Hamstring',
                'penanganan' => [
                    'istirahatkan kaki dari aktivitas berat',
                    'Posisikan kaki lebih tinggi dari kepala saat beristirahat',
                    'Kompres paha bagian dalam menggunakan es selama 15-20 menit setiap 6 jam sekali pada 3 hari pertama setelah cedera',
                    'Hindari berlari terlalu kencang',
                    'Hindari duduk terlalu lama tanpa mengganti posisi',
                    'Gunakan bantal di bawah lutut saat tidur untuk mengurangi tekanan pada bagian belakang paha',
                    'Segera lakukan pemeriksaan mri ke tenaga medis terdekat untuk mengetahui tingkat keparahan cedera',
                ],
            ],
            [
                'kode_cedera' => 'C005',
                'nama_cedera' => 'Dislokasi',
                'penanganan' => [
                    'segera pergi ke fasilitas medis terdekat untuk segera mereposisi sendi yang dislokasi',
                    'jangan mencoba mereposisi (memperbaiki) sendi sendiri',
                    'hindari menggerakan bagian sendi yang cedera',
                    'Tahan bagian yang cedera agar tidak terlalu banyak bergerak dengan menggunakan kain',
                    'Hindari aktivitas yang melibatkan sendi yang baru direposisi selama minimal 2 minggu',
                ],
            ],
            [
                'kode_cedera' => 'C006',
                'nama_cedera' => 'Fraktur',
                'penanganan' => [
                    'segera pergi ke fasilitas medis terdekat untuk mendapatkan bantuan',
                    'hindari menggerakan bagian tubuh yang patah',
                    'Tahan bagian yang patah lalu usahakan agar tetap diam dan tidak berubah posisinya',
                    'Hindari menopang beban berat pada bagian tubuh yang mengalami patah tulang',
                    'Hindari mengangkat atau menggerakakan bagian tubuh yang mengalami patah tulang',
                ],
            ],
        ];

        foreach ($cedera as $item) {
            DB::table('cedera')->insert([
                'kode_cedera' => $item['kode_cedera'],
                'nama_cedera' => $item['nama_cedera'],
                'penanganan' => json_encode($item['penanganan'], JSON_UNESCAPED_UNICODE),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
