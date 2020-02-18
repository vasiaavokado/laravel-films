<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerMain extends Controller
{





    public function index(Request $request){
        $view = view('main');

        $view->films = DB::table("films")->get();
        return $view;
    }


    const SELECT_GENRES_BY_FILM_ID =
        "SELECT name FROM genres"
        ." INNER JOIN films_genres fg on genres.id = fg.genre_id "
        ."WHERE film_id=:id";
    const SELECT_ACTORS_BY_FILM_ID =
        "SELECT name FROM actors "
        ."WHERE film_id=:id";

    public function film(int $id){

        $films = DB::select("SELECT * FROM films WHERE id=:id",["id"=>$id]);
        if(count($films) == 0){
            return redirect()->to("/404");
        }

        $film = $films[0];

        $film->genres = DB::table('genres')
            ->join('films_genres','id','genre_id')
            ->where('films_genres.film_id',$id)
            ->get();

        $film->actors = DB::table('actors')->where('film_id',$id)->pluck('name')->toArray();


        $view = view('film');
        $view->film = $film;
        return $view;


    }
}
