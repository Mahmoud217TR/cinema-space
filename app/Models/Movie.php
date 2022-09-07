<?php

namespace App\Models;

use App\Classes\Duration\Duration;
use App\Models\Traits\HasDurationTrait;
use App\Models\Traits\MediableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Models\Classes\Mediable;

class Movie extends Media
{
    use HasFactory, MediableTrait, HasDurationTrait;

    protected $with = ['media'];
    
}
