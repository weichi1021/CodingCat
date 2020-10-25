<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

    public function updateOrCreateCategory(Request $request)
    {
        $user = Auth::user();
        $categoryId = $request->get('category_id');
        $categoryName = $request->get('name');

        return response(
            $this->categoryService->updateOrCreateCategory($user, $categoryId, $categoryName)
        );
    }

    public function deleteCategory(Request $request)
    {
        $categoryId = $request->get('category_id');
        return response(
            $this->categoryService->deleteCategory($categoryId)
        );
    }
}
