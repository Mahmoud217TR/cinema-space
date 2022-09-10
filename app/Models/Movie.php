<?php

namespace App\Models;

use App\Classes\Duration\Duration;
use App\Models\Traits\HasDurationTrait;
use App\Models\Traits\MediableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory, MediableTrait, HasDurationTrait;

    protected $with = ['media'];
    
}
