<?php


namespace App\Http\Services;

use App\Http\Repositories\Classes\ArticleCategoriesRepository;
use App\Http\Repositories\Classes\ArticleRepository;

class ArticleService extends Service
{

    public $article_repository;
    public $article_categories_repository;

    public function __construct()
    {
        $this->article_repository = new ArticleRepository();
        $this->article_categories_repository = new ArticleCategoriesRepository();
    }

    public function getAll($table_name = "created_at",$order_type = "DESC")
    {
        return $this->article_repository->listAll($table_name,$order_type);
    }

    public function saveToDb($request)
    {
        if($request->hasFile("title_image")){
            $request->destination_url = (new FileService("public","articles"))->storeImage($request->file("title_image"));
        }else{
            return redirect()->back()->withErrors("Please upload file.");
        }
        // TODO Check how much correct which coming as a result.
        // TODO create pivot table for articles and categories relatinship.
        // TODO check DB::transaction function in here.
        $article = $this->article_repository->create($request);
        foreach ($request->category_ids as $category_id){
            $this->article_categories_repository->create($category_id,$article->id);
        }

        return redirect()->back()->with("success","Article created with successful.");
    }

}
