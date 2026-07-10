<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        
        $criterias = [
            ['code' => 'C1', 'name' => 'Status Orang Tua', 'weight' => 20, 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'C2', 'name' => 'Jumlah Tanggungan', 'weight' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'C3', 'name' => 'Penghasilan Orang Tua', 'weight' => 15, 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'C4', 'name' => 'Pekerjaan Orang Tua', 'weight' => 15, 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'C5', 'name' => 'Status Tempat Tinggal', 'weight' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'C6', 'name' => 'Keterangan Miskin', 'weight' => 30, 'created_at' => $now, 'updated_at' => $now],
            ['code' => 'C7', 'name' => 'Prestasi Non Akademik', 'weight' => 5, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('criterias')->insert($criterias);
    }
}