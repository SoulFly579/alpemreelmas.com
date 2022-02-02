<?php


namespace App\Http\Services;

use App\Http\Repositories\Classes\ArticleCategoriesRepository;
use App\Http\Repositories\Classes\ArticleRepository;
use App\Http\Requests\ArticleActiveRequest;

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
        // TODO create pivot table for articles and categories relationship.
        // TODO check DB::transaction function in here.

            list($result,$id) = $this->article_repository->create($request,false);
            !$result ? abort(500): null;
            if($request->category_ids && is_array($request->category_ids)){
                foreach ($request->category_ids as $category_id){
                    $this->article_categories_repository->create($category_id,$id);
                }
            }

        return redirect("/admin/articles")->with("success","Article created with successful.");
    }

    public function saveAsDraft($request)
    {
        if($request->hasFile("title_image")){
            $request->destination_url = (new FileService("public","articles"))->storeImage($request->file("title_image"));
        }else{
            return redirect()->back()->withErrors("Please upload file.");
        }
        list($result,$id) = $this->article_repository->create($request);

        !$result ? abort(500): null;
        if($request->category_ids && is_array($request->category_ids)){
            foreach ($request->category_ids as $category_id){
                $this->article_categories_repository->create($category_id,$id);
            }
        }

        return redirect("/admin/articles")->with("success","Article saved as draft.");
    }

}
