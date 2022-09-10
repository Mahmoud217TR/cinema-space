<?php

namespace App\Models\Traits;

use App\Models\Rating;

trait HasRatingTrait{

    public function ratings(){
        return $this->morphMany(Rating::class, 'ratable');
    }

    public function getRateAttribute():float{
        return round($this->ratings->avg('rate')??0,1);
    }

    public function getWeightedSumAttribute():float{
        return $this->ratings->reduce(function($sum, $rate){
            return $sum + $rate->weightedRating;
        })??0;
    }

    public function getRatingWeightsAttribute():float{
        return $this->ratings->sum('weight')??0;
    }
    
    public function getWeightedRateAttribute():float{
        return round($this->weightedSum/$this->ratingWeights??0,1);
    }

    public function guessRatableType(){
        return get_class($this);
    }

}