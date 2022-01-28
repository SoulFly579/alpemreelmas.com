<?php


namespace App\Http\Services;


use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileService
{
    public $visibility_type;
    public $destination;

    public function __construct($visibility_type,$destination)
    {
        $this->visibility_type = $visibility_type;
        $this->destination = $destination;

    }

    public function storeImage($file){
        $path = Storage::putFile("public/".$this->destination,new File($file),$this->visibility_type);
        // TODO check public comes from where.
        $destination_url = Str::replace("public","storage",$path);
        return $destination_url;
    }
}
