<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getCategoryList()
    {
        return response(
            $this->categoryService->getCategoryList()
        );
    }

    public function getCategoryById(Request $request)
    {
        $categoryId = $request->get('category_id');

        return response(
            $this->categoryService->getCategoryById($categoryId)
        );
    }
}
