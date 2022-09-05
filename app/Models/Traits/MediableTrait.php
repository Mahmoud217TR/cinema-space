<?php

namespace App\Models\Traits;

use App\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait MediableTrait{

    public function media(){
        return $this->morphOne(Media::class, 'mediable');
    }

    public function related()
    {
        return $this->media->related();
    }

    public function getRelatedAttribute(){
        return $this->media->related;
    }

    public function guessMediaType(){
        return get_class($this);
    }

    public function connect($mediaCollection){
        $this->media->relatedTo()->syncWithoutDetaching($this->extractMediaIds($mediaCollection));
    }

    public function extractMediaIds($mediaCollection){
        $media_ids=[];
        foreach($mediaCollection as $media){
            if($media instanceof Media){
                array_push($media_ids,$media->id);
            }else if(isMediable($media)){
                array_push($media_ids,$media->media->id);
            }else if(is_int($media)){
                if(Media::where('id','=',$media)->first()){
                    array_push($media_ids,$media);
                }
            }
        }
        return array_values(array_unique($media_ids));
    }
}