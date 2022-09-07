<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    public function mediable(){
        return $this->morphTo();
    }

    public function relatedTo()
    {
        return $this->belongsToMany(Media::class,'media_relations', 'media_id', 'related_id');
    }

    public function relatedFrom()
    {
        return $this->belongsToMany(Media::class,'media_relations', 'related_id','media_id');
    }

    public function related(){
        return $this->relatedto();
    }

    public function getRelatedAttribute(){
        return $this->relatedFrom->merge($this->relatedTo);
    }

    public function guessMediaType(){
        return get_class($this);
    }

    public function scopeMovies($query){
        $query->where('mediable_type','App\Models\Movie');
    }

    public function scopeShows($query){
        $query->where('mediable_type','App\Models\Show');
    }
}
