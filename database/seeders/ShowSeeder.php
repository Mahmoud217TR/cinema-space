<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Media;
use App\Models\Season;
use Illuminate\Database\Seeder;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::factory(3)->show()->create()->each(function($media){
            $season = Season::factory()->create();
            Episode::factory(2)
            ->withSeason($season->id)
            ->withShow($media->mediable->id)
            ->create();
        });
    }
}
