<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleActiveRequest;
use App\Http\Requests\ArticleDraftRequest;
use App\Http\Services\ArticleService;
use App\Http\Services\CategoryService;
use App\Http\Services\FileService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public $article_service;

    public function __construct()
    {
        $this->article_service = new ArticleService();
    }

    public function index()
    {
        $articles = $this->article_service->getAll("updated_at");
        return view("admin_panel.articles.index",compact("articles"));
    }

    public function create()
    {
        $categories = (new CategoryService())->getAll();
        return view("admin_panel.articles.create",compact("categories"));
    }

    public function store(ArticleActiveRequest $request)
    {
        return $this->article_service->saveToDb($request);
    }

    public function store_draft(ArticleDraftRequest $request)
    {
        return $this->article_service->saveAsDraft($request);
    }
}
