<?php


namespace App\Http\Services;


use Illuminate\Support\Str;

class Service
{

    public static function makeSlug($text){
        return Str::slug($text);
    }
}
