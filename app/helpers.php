<?php

use App\Models\Episode;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;

if (! function_exists('isMediable')) {
    function isMediable($var) {
        if(is_object($var)){
            return in_array(App\Models\Traits\MediableTrait::class, class_uses_recursive($var));
        }
        return false;
    } 
}

if (! function_exists('isStatable')) {
    function isStatable($var) {
        if(is_object($var)){
            return in_array(App\Models\Traits\StatableTrait::class, class_uses_recursive($var));
        }
        return false;
    } 
}

if (! function_exists('hasEpisodes')) {
    function hasEpisodes($var) {
        if(is_object($var)){
            return in_array(App\Models\Traits\hasEpisodes::class, class_uses_recursive($var));
        }
        return false;
    } 
}

if (! function_exists('isEpisode')) {
    function isEpisode($var) {
        if(is_object($var)){
            return $var instanceof Episode;
        }
        return false;
    } 
}

if (! function_exists('getCLassColumns')) {
    function getCLassColumns($class) {
        return \Schema::getColumnListing((new $class)->getTable());
    } 
}

if (! function_exists('getModels')) {
    function getModels() {
        $models = collect(File::allFiles(app_path()))
            ->map(function ($item) {
                $path = $item->getRelativePathName();
                $class = sprintf('\%s%s',
                    Container::getInstance()->getNamespace(),
                    strtr(substr($path, 0, strrpos($path, '.')), '/', '\\'));

                return $class;
            })
            ->filter(function ($class) {
                $valid = false;

                if (class_exists($class)) {
                    $reflection = new \ReflectionClass($class);
                    $valid = $reflection->isSubclassOf(Model::class) &&
                        !$reflection->isAbstract();
                }

                return $valid;
            })->map(function($path){
                return new $path;
            });

        return $models->values();
    } 
}

if (! function_exists('getMediables')) {
    function getMediables() {
        return getModels()->filter(function($model){
            return isMediable($model);
        })->values();
    } 
}

if (! function_exists('getStatables')) {
    function getStatables() {
        return getModels()->filter(function($model){
            return isStatable($model);
        })->values();
    } 
}

if (! function_exists('getClassFromName')) {
    function getClassFromName($name) {
        $class = new $name;
        return $class;
    } 
}

if (! function_exists('getContextClass')) {
    function getContextClass($class) {

        if(isEpisode($class)){
            return getClassFromName($class->episodes_of_type??'App\Models\Episode');
        }
        
        $class = getClassFromName($class);

        if(isMediable($class)){
            return getClassFromName('App\Models\Media');
        }

        
        return $class;
    } 
}