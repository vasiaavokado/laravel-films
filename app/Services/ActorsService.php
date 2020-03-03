<?php


namespace App\Services;


use App\Models\Actor;
use App\Models\Film;

class ActorsService
{
    public function createActor(Film $film, string $actorName){
        $actor = new Actor();
        $actor->name = $actorName;
        $actor->film_id = $film->id;
        $actor->save();
    }
}