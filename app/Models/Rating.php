<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function ratable(){
        return $this->morphTo('ratable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getWeightedRatingAttribute(){
        return ($this->rate * $this->weight);
    }
}
