<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\WowsInMovies;
use App\Models\Videos;

class WowsInMovieController extends Controller
{
    public function index() {
        $wowsInMovies = WowsInMovies::with('videos')->get();
        return response()->json($wowsInMovies);
    }

    public function external() {

       if(WowsInMovies::all()->count() != 0 ) {
         return response()->json(['status' => "success"]);
       }

       $response = Http::get('https://owen-wilson-wow-api.herokuapp.com/wows/random?results=5');
       if ($response->failed()) {
        return response()->json(['status' => "failed", 'message' => 'unable to call owen wilson endpoint'], 500);
       }

       $wowsInMovieList = json_decode($response);

       try {
          DB::beginTransaction();

          foreach ($wowsInMovieList as $wowsInMovie) {
              $releaseDate = strtotime($wowsInMovie->release_date);

              $newWowsInMovie = new WowsInMovies();
              $newWowsInMovie->movie = $wowsInMovie->movie;
              $newWowsInMovie->year = $wowsInMovie->year;
              $newWowsInMovie->release_date = date('y-m-d',$releaseDate);
              $newWowsInMovie->director = $wowsInMovie->director;
              $newWowsInMovie->character = $wowsInMovie->character;
              $newWowsInMovie->movie_duration = $wowsInMovie->movie_duration;
              $newWowsInMovie->timestamp = $wowsInMovie->timestamp;
              $newWowsInMovie->full_line = $wowsInMovie->full_line;
              $newWowsInMovie->current_wow_in_movie = $wowsInMovie->current_wow_in_movie;
              $newWowsInMovie->total_wows_in_movie = $wowsInMovie->total_wows_in_movie;
              $newWowsInMovie->poster = $wowsInMovie->poster;
              $newWowsInMovie->audio = $wowsInMovie->audio;
              $newWowsInMovie->save();

              $newVideos = new Videos();
              $newVideos->wows_in_movies_id = $newWowsInMovie->id;
              $newVideos->resolution_1080p = $wowsInMovie->video->{'1080p'};
              $newVideos->resolution_720p = $wowsInMovie->video->{'720p'};
              $newVideos->resolution_480p = $wowsInMovie->video->{'480p'};
              $newVideos->resolution_360p = $wowsInMovie->video->{'360p'};
              $newVideos->save();
          }

          DB::commit();
          return response()->json(['status' => "success"]);
       } catch(\Exception $ex){
           Log::error($ex->getMessage());
           Log::error($ex->getTraceAsString());
           throw new \Exception("Was unable to store owen wilson data");
           return response()->json(['status' => "failed"],500);
       }
    }
}
