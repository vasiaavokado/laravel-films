<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function users(){
        $users = User::all();
        return response()->json($users);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws ApiException
     */
    public function user(int $id){
        $user = User::find($id);
        if($user==null){
            throw new ApiException("user not found");
        }
        return response()->json($user);
    }

}
