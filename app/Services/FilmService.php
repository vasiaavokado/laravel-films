<?php


namespace App\Services;


use App\Models\Film;
use Illuminate\Http\Request;

interface FilmService
{
    public function getPagination();
    public function get(int $id):Film;
    public function addFilm(Request $request,string $img,string $banner,array $genre,array $actors);
}