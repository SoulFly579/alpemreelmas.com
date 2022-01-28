<?php


namespace App\Http\Repositories\Classes;


use App\Http\Repositories\Interfaces\ArticleInterfaces;
use App\Http\Services\Service;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleRepository implements ArticleInterfaces
{
    public function create($request){
        $articles = new Article();
        $articles->title = $request->title;
        $articles->title_image = $request->destination_url ? $request->destination_url : null;
        $articles->sub_content = substr($request->content,0,150);
        $articles->content = $request->content;
        $articles->slug = Service::makeSlug($request->title);
        $articles->is_draft = false;
        $articles->is_active = $request->is_active ? "true" : "false";
        $articles->descriptions = $request->descriptions;
        $articles->user_id = Auth::id();
        $articles->save();

        return $articles;
    }

    public function listAll($table_name, $order_type)
    {
        return Article::orderBy($table_name,$order_type)->get();
    }

}
