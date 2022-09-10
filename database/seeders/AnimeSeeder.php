<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Media;
use App\Models\Rating;
use App\Models\Season;
use Illuminate\Database\Seeder;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::factory(5)->anime()->create()->each(function($media){
            $season = Season::factory()->create();
            Rating::factory(3)->withSeason($season)->create();

            Episode::factory(3)
            ->withSeason($season)
            ->withAnime($media->mediable)
            ->create()
            ->each(function($episode){
                Rating::factory(3)->withEpisode($episode)->create();
            });
            
            Rating::factory(3)->withMedia($media)->create();
        });
    }
}
