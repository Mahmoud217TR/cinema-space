<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Media;
use App\Models\Season;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call([
            
        // ]);

        Media::factory(7)->movie()->create();
        Media::factory(3)->show()->create()->each(function($media){
            $season = Season::factory()->create();
            Episode::factory(2)
                ->withSeason($season->id)
                ->withShow($media->mediable->id)
                ->create();
        });
        Media::factory(5)->series()->create()->each(function($media){
            $season = Season::factory()->create();
            Episode::factory(3)
                ->withSeason($season->id)
                ->withSeries($media->mediable->id)
                ->create();
        });
    }
}
