<?php

namespace App\Http\Controllers;

use App\Http\Services\ArticleService;
use App\Http\Services\CategoryService;

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

    public function store()
    {

    }
}
