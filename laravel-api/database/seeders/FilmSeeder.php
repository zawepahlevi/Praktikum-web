<?php

namespace Database\Seeders;
use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \faker\Factory::create('id_ID');
        for($i=0;$i<10;$i++){
            Film::create([
                'judul'=>$faker->sentence,
                'pembuat'=>$faker->name,
                'tanggal_upload'=>$faker->date
            ]);
        }
    }
}
