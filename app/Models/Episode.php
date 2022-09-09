<?php

namespace App\Models;

use App\Models\Traits\HasDurationTrait;
use App\Models\Traits\StatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory, StatableTrait, HasDurationTrait;

    protected $with = ['episodable'];

    public function episodable(){
        return $this->morphTo();
    }

    public function season(){
        return $this->belongsTo(Season::class);
    }

}
