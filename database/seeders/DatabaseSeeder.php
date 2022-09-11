<?php

namespace Database\Seeders;

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
            UserSeeder::class,
            MovieSeeder::class,
            SeriesSeeder::class,
            ShowSeeder::class,
            AnimeSeeder::class,
            CartoonSeeder::class,
            GameSeeder::class,
            MusicSeeder::class,
            BookSeeder::class,
            MangaSeeder::class,
            ComicSeeder::class,
        ]);
        
    }
}
