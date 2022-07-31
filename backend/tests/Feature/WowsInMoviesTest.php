<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WowsInMoviesTest extends TestCase
{
    public function testRetrieveExternalData()
    {
        $response = $this->get('/api/wows-in-movie/external', ['Accept' => 'application/json']);
        $response
            ->assertStatus(200);
    }

    public function testRetrieveInternalData()
    {
        $response = $this->get('/api/wows-in-movie', ['Accept' => 'application/json']);

        $response->assertStatus(200)
                ->assertJsonStructure([
                        '*' => [
                            'id',
                            'movie',
                            'year',
                            'release_date',
                            'director',
                            'movie_duration',
                            'timestamp',
                            'full_line',
                            'current_wow_in_movie',
                            'total_wows_in_movie',
                            'created_at',
                            'updated_at',
                            'videos' => [
                               '*' => [
                                   'id',
                                   'wows_in_movies_id',
                                   'resolution_1080p',
                                   'resolution_720p',
                                   'resolution_480p',
                                   'resolution_360p',
                                   'created_at',
                                   'updated_at',
                               ]
                            ]
                        ]
                 ]);
    }
}
