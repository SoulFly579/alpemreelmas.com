<?php


namespace App\Http\Services;

use App\Http\Repositories\Classes\ArticleRepository;

class ArticleService extends Service
{

    public $article_repository;

    public function __construct()
    {
        $this->article_repository = new ArticleRepository();
    }

    public function getAll($table_name = "created_at",$order_type = "DESC")
    {
        return $this->article_repository->listAll($table_name,$order_type);
    }

    public function saveToDb($request)
    {
        if($request->hasFile("title_image")){
            $request->destination_url = (new FileService("public","articles"))->storeImage($request->file("title_image"));
        }
        return $this->article_repository->create($request);
        // TODO create pivot table for articles and categories relatinship.
    }

}
