<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;

class CategoryController extends Controller
{

    public $category_service;

    public function __construct()
    {
        $this->category_service = new CategoryService();
    }

    public function index()
    {
        $categories = $this->category_service->getAll("updated_at");
        return view("admin_panel.categories.index",compact("categories"));
    }

    public function create()
    {
        return view("admin_panel.categories.create");
    }

    public function store(CategoryRequest $request)
    {
        return $this->category_service->create($request);
    }

    public function edit(Category $category)
    {
        return view("admin_panel.categories.edit",compact("category"));
    }



}
