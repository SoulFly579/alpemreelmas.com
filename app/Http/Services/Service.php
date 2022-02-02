<?php


namespace App\Http\Services;


use Illuminate\Support\Str;

class Service
{
    public static function makeSlug($text){
        return Str::slug($text);
    }

    public static function checkAndMoveImages($request,$image,$visibility_type,$destination)
    {
        if($image){
            $request->destination_url = (new FileService("public","articles"))->storeImage($image);
        }
        return $request;
    }
}
