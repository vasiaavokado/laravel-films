<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ControllerMain extends Controller
{
    private $films = [
        [
            "id"=>1,
            "name"=>"Молчание ягнят",
            "actors"=>["Хопкинс","Вася пупкин"],
            "year"=>2012,
            "genres"=>["Ужасы","Комедия"],
            "description"=>"Lorem ipsum ....",
            "rate"=>4.2,
            "img"=>"https://st.kp.yandex.net/images/film_iphone/iphone360_345.jpg"
        ],
        [
            "id"=>2,
            "name"=>"Молчание ягнят",
            "actors"=>["Хопкинс","Вася пупкин"],
            "year"=>2012,
            "genres"=>["Ужасы","Комедия"],
            "description"=>"Lorem ipsum ....",
            "rate"=>4.2,
            "img"=>"https://st.kp.yandex.net/images/film_iphone/iphone360_345.jpg"
        ],
        [
            "id"=>3,
            "name"=>"Молчание ягнят",
            "actors"=>["Хопкинс","Вася пупкин"],
            "year"=>2012,
            "genres"=>["Ужасы","Комедия"],
            "description"=>"Lorem ipsum ....",
            "rate"=>4.2,
            "img"=>"https://st.kp.yandex.net/images/film_iphone/iphone360_345.jpg"
        ],
        [
            "id"=>14,
            "name"=>"Молчание ягнят",
            "actors"=>["Хопкинс","Вася пупкин"],
            "year"=>2012,
            "genres"=>["Ужасы","Комедия"],
            "description"=>"Lorem ipsum ....",
            "rate"=>4.2,
            "img"=>"https://st.kp.yandex.net/images/film_iphone/iphone360_345.jpg"
        ],
        [
            "id"=>5,
            "name"=>"Молчание ягнят",
            "actors"=>["Хопкинс","Вася пупкин"],
            "year"=>2012,
            "genres"=>["Ужасы","Комедия"],
            "description"=>"Lorem ipsum ....",
            "rate"=>4.2,
            "img"=>"https://st.kp.yandex.net/images/film_iphone/iphone360_345.jpg"
        ],
        [
            "id"=>6,
            "name"=>"Молчание ягнят",
            "actors"=>["Хопкинс","Вася пупкин"],
            "year"=>2012,
            "genres"=>["Ужасы","Комедия"],
            "description"=>"Lorem ipsum ....",
            "rate"=>4.2,
            "img"=>"https://st.kp.yandex.net/images/film_iphone/iphone360_345.jpg"
        ],
        [
            "id"=>7,
            "name"=>"Молчание ягнят",
            "actors"=>["Хопкинс","Вася пупкин"],
            "year"=>2012,
            "genres"=>["Ужасы","Комедия"],
            "description"=>"Lorem ipsum ....",
            "rate"=>4.2,
            "img"=>"https://st.kp.yandex.net/images/film_iphone/iphone360_345.jpg"
        ],
        [
            "id"=>8,
            "name"=>"Молчание ягнят",
            "actors"=>["Хопкинс","Вася пупкин"],
            "year"=>2012,
            "genres"=>["Ужасы","Комедия"],
            "description"=>"Lorem ipsum ....",
            "rate"=>4.2,
            "img"=>"https://st.kp.yandex.net/images/film_iphone/iphone360_345.jpg"
        ],
    ];






    public function index(Request $request){
        $view = view('main');
        $view->films = $this->films;
        return $view;
    }

    public function film(int $id){

        $film = null;
        foreach ($this->films as $f){
            if($f["id"]==$id){
                $film = $f;
                break;
            }
        }

        if($film == null){
            return redirect()->to("/404");
        }


        $view = view('film');
        $view->film = $film;
        return $view;


    }
}
