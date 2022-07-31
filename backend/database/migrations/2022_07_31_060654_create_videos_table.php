<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("wows_in_movies_id");
            $table->string("resolution_1080p");
            $table->string("resolution_720p");
            $table->string("resolution_480p");
            $table->string("resolution_360p");
            $table->timestamps();

            $table->foreign('wows_in_movies_id')->references('id')->on('wows_in_movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
