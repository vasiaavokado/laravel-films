<?php

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedGenres extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::firstOrCreate(["name"=>"Ужасы"]);
        Genre::firstOrCreate(["name"=>"Триллер"]);
        Genre::firstOrCreate(["name"=>"Комедия"]);
        Genre::firstOrCreate(["name"=>"Фантастика"]);
        Genre::firstOrCreate(["name"=>"Боевик"]);
        Genre::firstOrCreate(["name"=>"Фентези"]);
        Genre::firstOrCreate(["name"=>"Мистика"]);
        Genre::firstOrCreate(["name"=>"Мультфильмы"]);
    }
}
