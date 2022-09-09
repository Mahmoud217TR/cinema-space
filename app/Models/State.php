<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public function statables(){
        $class = getClassFromName(getClassFromName($this->statable_type)->guessStatableType());
        return $this->hasMany($class,'state_id','id');
    }

    public function scopeStatesOf($query, $class){
        $query->where('statable_type', '=', $class);
    }

    public static function getStatesOf($class){
        return State::statesOf($class)->get();
    }
}
