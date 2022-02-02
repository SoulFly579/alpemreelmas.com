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
        return $article_categories->save();
    }

    public function findByArticleId($id)
    {
        return ArticleCategory::where("article_id",$id)->get();
    }

    public function update($category_id,$id)
    {
        $article_categories = $this->findByArticleId($id);
        if($article_categories->count() > 0){
            foreach ($article_categories as $article_category){
                $article_category->delete();
            }
        }
        return $this->create($category_id,$id);

    }
}
