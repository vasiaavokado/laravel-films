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

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get("/", "ControllerAdmin@index");
    Route::post("/addfilm", "ControllerAdmin@addfilm")->name("addfilmhandle");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
