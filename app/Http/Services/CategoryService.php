<?php


namespace App\Http\Services;


use App\Http\Repositories\Classes\CategoryRepository;
use Illuminate\Foundation\Http\FormRequest;

class CategoryService extends Service
{
    public $category_repository;

    public function __construct()
    {
        $this->category_repository = new CategoryRepository();
    }

    public function create(FormRequest $request){

        if(!$this->category_repository->findSameNameOrSameSlug($request)){
            $this->category_repository->create($request);
            return redirect()->back()->with("success","You added category with successfully.");
        }else{
            return redirect()->back()->withErrors("This name already given another category.");
        }
    }

    public function getAll($table_name = "created_at",$order_type = "DESC")
    {
        return $this->category_repository->listAll($table_name,$order_type);
    }
}
