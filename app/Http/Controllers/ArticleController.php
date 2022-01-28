<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleActiveRequest;
use App\Http\Services\ArticleService;
use App\Http\Services\CategoryService;
use App\Http\Services\FileService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public $article_services;

    public function __construct()
    {
        $this->article_services = new ArticleService();
    }

    public function index()
    {
        $articles = $this->article_services->getAll("updated_at");
        return view("admin_panel.articles.index",compact("articles"));
    }

    public function create()
    {
        $categories = (new CategoryService())->getAll();
        return view("admin_panel.articles.create",compact("categories"));
    }

    public function store(ArticleActiveRequest $request)
    {
        return $this->article_services->saveToDb($request);
    }

    public function upload(Request $request){
        if($request->hasFile("title_image")){
            return (new FileService("public","temp"))->storeImage($request->file("title_image"));
        }
        return "";
    }
}
