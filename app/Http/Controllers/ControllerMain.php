<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Services\FilmService;
use App\Services\FilmServiceImpl;
use App\Services\TestService;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ControllerMain extends Controller
{
    /**
     * @var FilmServiceImpl
     */
    private $filmService;


    /**
     * ControllerMain constructor.
     */
    public function __construct(FilmService $filmService)
    {
        $this->filmService=$filmService;
    }

    public function index(Request $request)
    {
        $view = view('main');
        $view->films = $this->filmService->getPagination();
        return $view;
    }


    public function film(int $id)
    {
            $view = view('film');
            $view->film =$this->filmService->get($id);
            return $view;
    }
}
