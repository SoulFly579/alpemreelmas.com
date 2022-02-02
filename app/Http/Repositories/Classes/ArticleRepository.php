<?php


namespace App\Http\Repositories\Classes;


use App\Http\Repositories\Interfaces\ArticleInterfaces;
use App\Http\Services\Service;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleRepository implements ArticleInterfaces
{
    public function create($request,$draft = true){
        $article = new Article();
        $article->title = $request->title;
        $article->title_image = $request->destination_url ? $request->destination_url : null;
        $article->content = $request->content;
        $article->slug = Service::makeSlug($request->title);
        $article->is_draft = $draft;
        $article->is_active = $request->is_active == "true" && !$draft  ? true : false;
        $article->descriptions = $request->descriptions;
        $article->title_image = $request->destination_url ?  $request->destination_url : null;
        $article->user_id = Auth::id();

        return array($article->save(),$article->id);
    }

    public function listAll($table_name, $order_type)
    {
        return Article::orderBy($table_name,$order_type)->get();
    }

    public function updateDraft($article,$request)
    {
        $article->title = $request->title;
        $article->content = $request->content;
        $article->is_draft = true;
        $article->descriptions = $request->descriptions;
        $article->slug = Service::makeSlug($request->title);
        $article->is_active = $request->is_active == "true" ? true : false;
        return array($article->save(),$article->id);
    }

    public function publish($request,$article)
    {
        $article->title = $request->title;
        $article->title_image = $request->destination_url;
        $article->content = $request->content;
        $article->slug = Service::makeSlug($request->title);
        $article->is_draft = false;
        $article->is_active = $request->is_active == "true" ? true : false;
        $article->descriptions = $request->descriptions;
        return array($article->save(),$article->id);
    }

    public function findById($id)
    {
        return Article::where("id",$id)->first();
    }

}
