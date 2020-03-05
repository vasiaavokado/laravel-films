<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFilmRequest;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Role;
use App\Services\FilmService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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

    public function users(Request $request){
        $v = view("admin.users");

        $userQuery = User::latest('id');
        if(!empty($request->get("name"))){
            $userQuery = $userQuery->where("name","LIKE","%".$request->get("name")."%");
        }
        if(!empty($request->get("id"))){
            $userQuery = $userQuery->where("id",(int)$request->get("id"));
        }
        if(!empty($request->get("email"))){
            $userQuery = $userQuery->where("email","LIKE","%".$request->get("email")."%");
        }



        $v->users = $userQuery->paginate(20)->appends(request()->input());
        $v->roles = Role::all();
        return $v;
    }

    public function setRoles(Request $request){

        /***
         * @var $user User
         */
        $user = User::findOrFail((int)$request->post("user_id"));

        /***
         * @var $userRoles Collection
         */
        $userRoles = $user->roles->pluck("id");

        /***
         * @var $userRoles Collection
         */
        $roles = Collection::wrap($request->post("roles",[]))->map(function ($r){
            return (int)$r;
        });

        $rolesForDetouch = $userRoles->filter(function ($role) use ($roles){
            return !$roles->contains($role);
        });

        $rolesForAttach = $roles->filter(function ($role) use ($userRoles){
            return !$userRoles->contains($role);
        });


        DB::transaction(function () use ($rolesForDetouch,$user,$rolesForAttach){
            foreach ($rolesForDetouch as $role){
                $user->roles()->detach($role);
            }
            foreach ($rolesForAttach as $role){
                $user->roles()->attach($role);
            }
        });


        return redirect()->back();
    }
}
