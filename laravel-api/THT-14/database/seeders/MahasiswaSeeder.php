<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 50; $i++){
            Mahasiswa::create([
                'nim'=>$faker->numberBetween($min = 1, $max = 999999),
                'nama'=>$faker->name
            ]);
        }
    }
}
