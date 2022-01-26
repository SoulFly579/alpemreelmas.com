<?php


namespace App\Http\Repositories\Classes;


use App\Http\Repositories\Interfaces\CategoryInterfaces;
use App\Http\Services\Service;
use App\Models\Category;

class CategoryRepository implements CategoryInterfaces
{
    public function create($request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Service::makeSlug($request->name);
        $category->save();

        return $category;
    }

    public function findSameNameOrSameSlug($request)
    {
        return Category::where("slug",Service::makeSlug($request->name))->where("name",$request->name)->first();
    }

    public function listAll($table_name,$order_type)
    {
        return Category::orderBy($table_name,$order_type)->get();
    }
}
