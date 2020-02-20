<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films_genres', function (Blueprint $table) {
            $table->bigInteger('film_id')->unsigned();
            $table->bigInteger('genre_id')->unsigned();
            $table->primary(["film_id","genre_id"]);
            $table->foreign("film_id")
                ->references("id")
                ->on("films");
            $table->foreign("genre_id")
                ->references("id")
                ->on("genres");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films_genres');
    }
}
