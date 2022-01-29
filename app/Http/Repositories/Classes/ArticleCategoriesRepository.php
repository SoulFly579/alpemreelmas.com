<?php


namespace App\Http\Repositories\Classes;


use App\Http\Repositories\Interfaces\ArticleCategoriesInterfaces;
use App\Models\ArticleCategory;

class ArticleCategoriesRepository implements ArticleCategoriesInterfaces
{
    public function create($category_id,$articles_id){
        $article_categories = new ArticleCategory();
        $article_categories->category_id = $category_id;
        $article_categories->article_id = $articles_id;
        $article_categories->save();
    }
}
