<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("/", "ControllerMain@index")->name("main");

Route::get("/film/{id}", [
    'uses'=>"ControllerMain@film",
    'middleware'=>['auth']
])
    ->where("id", "[0-9]+")
    ->name("film");

Route::prefix('admin')->middleware(['auth','role:read_admin_panel'])->group(function () {
    Route::get("/", "ControllerAdmin@index");
    Route::post("/addfilm", "ControllerAdmin@addfilm")->name("addfilmhandle");
    Route::post("/addroles", "ControllerAdmin@setRoles")
        ->middleware("role:write_admin_panel")
        ->name("saveuserroles");
    Route::get("/users", "ControllerAdmin@users")->name("users");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
