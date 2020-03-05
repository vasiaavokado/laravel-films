<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
        });

        Schema::create('user_roles', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('user_id')->references("id")->on("users");
            $table->foreign('role_id')->references("id")->on("roles");
            $table->primary(["user_id","role_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
