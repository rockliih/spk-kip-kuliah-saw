<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CollegeStudentSeeder extends Seeder
{
    public function run(): void
    {
        // Menggunakan Faker dengan lokal Indonesia
        $faker = Faker::create('id_ID');
        $now = Carbon::now();
        $students = [];

        for ($i = 1; $i <= 50; $i++) {
            $idNumber = '112300' . str_pad($i, 2, '0', STR_PAD_LEFT);
            
            $students[] = [
                'id_number'  => $idNumber,
                'name'       => $faker->name,
                // Mengisi nilai kriteria acak dari skala 1 sampai 5 (sesuaikan jika skalanya berbeda)
                'c1'         => rand(1, 5),
                'c2'         => rand(1, 5),
                'c3'         => rand(1, 5),
                'c4'         => rand(1, 5),
                'c5'         => rand(1, 5),
                'c6'         => rand(1, 5),
                'c7'         => rand(1, 5),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('college_students')->insert($students);
    }
}