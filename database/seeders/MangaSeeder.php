<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Media;
use App\Models\Rating;
use Illuminate\Database\Seeder;

class MangaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::factory(5)->manga()->create()->each(function($media){

            Chapter::factory(3)
            ->withManga($media->mediable)
            ->create()
            ->each(function($chapter){
                Rating::factory(3)->withChapter($chapter)->create();
            });
            
            Rating::factory(3)->withMedia($media)->create();
        });
    }
}
