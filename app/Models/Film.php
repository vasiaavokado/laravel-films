<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public $timestamps = false;

    public function actors(){
        return $this->hasMany(Actor::class,'film_id','id');
    }

    public function genres(){
        return $this->belongsToMany(
            Genre::class,
            "films_genres",
            'film_id',
            'genre_id'
        )->withPivot(['x']);
    }
}
