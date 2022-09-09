<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Media;
use App\Models\Season;
use Illuminate\Database\Seeder;

class CartoonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::factory(5)->cartoon()->create()->each(function($media){
            $season = Season::factory()->create();
            Episode::factory(3)
            ->withSeason($season->id)
            ->withCartoon($media->mediable->id)
            ->create();
        });
    }
}
