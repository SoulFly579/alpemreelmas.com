<?php


namespace App\Http\Repositories\Interfaces;

interface ArticleInterfaces
{
    public function create($request);
    public function updateDraft($article,$request);
}
