<?php

namespace App\Models;

use App\Models\Traits\EpisodableTrait;
use App\Models\Traits\MediableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartoon extends Model
{
    use HasFactory, MediableTrait, EpisodableTrait;

    protected $with = ['media'];
}
