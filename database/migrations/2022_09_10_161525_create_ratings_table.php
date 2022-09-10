<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('comment')->nullable();
            $table->morphs('ratable');
            $table->foreignIdFor(User::class);
            $table->unsignedInteger('rate')->min(1)->max(10);
            $table->unsignedInteger('weight')->min(0)->default(1);
            $table->boolean('spoiler')->default(false);
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
        Schema::dropIfExists('ratings');
    }
}
