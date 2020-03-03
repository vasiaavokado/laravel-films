<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFilmRequest;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use App\Services\FilmService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ControllerAdmin extends Controller
{
    private $filmsService;

    /**
     * ControllerAdmin constructor.
     * @param $filmsService
     */
    public function __construct(FilmService $filmsService)
    {
        $this->filmsService = $filmsService;
    }


    public function index(){
        $v =  view('admin.addfilm');
        $v->genres = Genre::all();
        return $v;
    }

    public function addfilm(CreateFilmRequest $request){
            $genre = $request->post("genre");
            $actors = explode(",", $request->post("actors", ""));

            $img = $request->file("img")->store("images", ['disk' => 'public']);
            $banner = $request->file("banner")->store("images", ['disk' => 'public']);

            $this->filmsService->addFilm($request,$img,$banner,$genre,$actors);

            return redirect()->back();
    }
}
