<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerMain extends Controller
{


    public function index(Request $request)
    {
        $view = view('main');
        $view->films = Film::latest('id')->paginate(9);
        return $view;
    }


    public function film(int $id)
    {
        try {
            $view = view('film');
            $view->film = Film::findOrFail($id);
            return $view;
        } catch (ModelNotFoundException $e) {
            return redirect()->to("/404");
        }

    }
}
