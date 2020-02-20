<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ControllerAdmin extends Controller
{
    public function index(){

        $v =  view('admin.addfilm');
        $v->genres = Genre::all();
        return $v;
    }

    public function addfilm(Request $request){

        $genre = $request->post("genre");
        $actors = explode(",",$request->post("actors",""));


        $img = $request->file("img")->store("images",['disk'=>'public']);
        $banner = $request->file("banner")->store("images",['disk'=>'public']);

        DB::transaction(function () use ($request,$img,$banner,$genre,$actors){
            $film = new Film();
            $film->name = $request->post("name");
            $film->year = (int)$request->post("year");
            $film->rate = 5;
            $film->img = $img;
            $film->banner = $banner;
            $film->description = $request->post("desc");
            $film->save();

            foreach ($genre as $g){
                $film->genres()->attach((int)$g);
            }

            foreach ($actors as $a){
                $a = trim($a);
                if(empty($a)) continue;
                $actor = new Actor();
                $actor->name = $a;
                $actor->film_id = $film->id;
                $actor->save();
            }
        });









        return "ok";
    }
}
