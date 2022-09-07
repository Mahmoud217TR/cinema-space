<?php

namespace Database\Seeders;

use App\Models\Media;
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
        Media::factory(3)->show()->create();
        Media::factory(5)->series()->create();
    }
}
