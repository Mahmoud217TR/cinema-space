<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Media;
use App\Models\Season;
use App\Models\Series;
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
        $this->call([
            MovieSeeder::class,
            SeriesSeeder::class,
            ShowSeeder::class,
            AnimeSeeder::class,
            CartoonSeeder::class,
        ]);
        
    }
}
