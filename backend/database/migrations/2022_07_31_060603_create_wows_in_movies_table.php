<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWowsInMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wows_in_movies', function (Blueprint $table) {
            $table->id();
            $table->string("movie");
            $table->integer("year");
            $table->string("release_date");
            $table->string("director");
            $table->string("character");
            $table->string("movie_duration");
            $table->string("timestamp");
            $table->string("full_line");
            $table->integer("current_wow_in_movie");
            $table->integer("total_wows_in_movie");
            $table->string("poster");
            $table->string("audio");
            $table->timestamps("");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wow_in_movies');
    }
}
