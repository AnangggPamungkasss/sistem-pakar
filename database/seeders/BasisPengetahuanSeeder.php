<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BasisPengetahuanSeeder extends Seeder
{
    public function run(): void
    {
        $rules = [
            'R001' => ['G001','G002','G004','G006','G007','G008','G013','G017','G019','G023','G025'],
            'R002' => ['G002','G005','G006','G009','G010','G017','G018','G021','G022','G023','G027'],
            'R003' => ['G001','G006','G007','G009','G017','G018','G021','G023','G024','G025','G027'],
            'R004' => ['G004','G007','G009','G011','G014','G016','G017','G020','G023','G026'],
            'R005' => ['G001','G004','G008','G011','G012','G013','G015','G017','G023','G025'],
            'R006' => ['G003','G004','G005','G006','G012','G015','G017','G023'],
        ];

        $cederaMap = [
            'R001' => 'C001',
            'R002' => 'C002',
            'R003' => 'C003',
            'R004' => 'C004',
            'R005' => 'C005',
            'R006' => 'C006',
        ];

        foreach ($rules as $ruleCode => $gejalaList) {
            foreach ($gejalaList as $gejalaCode) {
                DB::table('basis_pengetahuan')->insert([
                    'kode_rule' => $ruleCode,
                    'gejala_id' => DB::table('gejala')->where('kode_gejala', $gejalaCode)->value('id'),
                    'cedera_id' => DB::table('cedera')->where('kode_cedera', $cederaMap[$ruleCode])->value('id'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}