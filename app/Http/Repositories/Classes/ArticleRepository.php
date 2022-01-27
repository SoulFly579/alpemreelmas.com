<?php


namespace App\Http\Repositories\Classes;


use App\Http\Repositories\Interfaces\ArticleInterfaces;
use App\Models\Article;

class ArticleRepository implements ArticleInterfaces
{
    public function create($request){
        // TODO save articles
    }

    public function listAll($table_name, $order_type)
    {
        return Article::orderBy($table_name,$order_type)->get();
    }

}
