<?php

namespace App\Models;

use App\Models\Traits\HasChaptersTrait;
use App\Models\Traits\MediableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, MediableTrait;

    protected $with = ['media'];
}
