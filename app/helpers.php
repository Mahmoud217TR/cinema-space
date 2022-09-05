<?php

if (! function_exists('isMediable')) {
    function isMediable($var) {
        if(is_object($var)){
            return in_array(App\Models\Traits\MediableTrait::class, class_uses_recursive($var));
        }
        return false;
    } 
}