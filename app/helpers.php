<?php

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