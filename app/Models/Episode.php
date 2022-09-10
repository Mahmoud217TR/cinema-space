<?php

namespace App\Models;

use App\Models\Traits\HasDurationTrait;
use App\Models\Traits\HasRatingTrait;
use App\Models\Traits\StatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory, StatableTrait, HasDurationTrait, HasRatingTrait;

    protected $with = ['episodes_of'];

    public function episodes_of(){
        return $this->morphTo('episodes_of');
    }

    public function season(){
        return $this->belongsTo(Season::class);
    }

    public function scopeInSeason($query,Season $season){
        $query->where('season_id','=',$season->id);
    }

    public static function getLastPositio($episode):int {
        return self::InSeason($episode->season)->max('position');
    }

}
