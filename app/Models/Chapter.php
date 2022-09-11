<?php

namespace App\Models;

use App\Models\Traits\HasRatingTrait;
use App\Models\Traits\StatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory, StatableTrait, HasRatingTrait;

    protected $with = ['chapters_of'];

    public function chapters_of(){
        return $this->morphTo('chapters_of');
    }

}
