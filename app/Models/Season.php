<?php

namespace App\Models;

use App\Models\Traits\StatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory, StatableTrait;

    protected $with = ['state'];

    public function episode(){
        return $this->hasMany(Episode::class);
    }
}
