<?php

use App\Models\Season;
use App\Models\State;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->morphs('episodes_of');
            $table->text('description')->nullable();
            $table->date('release_date')->nullable();
            $table->unsignedInteger('duration_in_sec')->nullable();
            $table->foreignIdFor(State::class);
            $table->foreignIdFor(Season::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
