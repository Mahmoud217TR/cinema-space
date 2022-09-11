<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Rating;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::factory(3)
            ->game()
            ->create()
            ->each(function ($media) {
                Rating::factory(5)->withMedia($media)->create();
            });
    }
}