<?php

namespace App\Models;

use App\Models\Traits\MediableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Movie extends Model
{
    use HasFactory, MediableTrait;

    protected $with = ['media'];
}
