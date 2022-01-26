<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;

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
        return view("",compact("categories"));
    }

    public function create()
    {
        return view("admin_panel.categories.create");
    }

    public function store(CategoryRequest $request)
    {
        $this->category_service->create($request);
        return redirect()->back()->with("succes","Başarılı bir şekilde kayıt edilmiştir.");
    }



}
