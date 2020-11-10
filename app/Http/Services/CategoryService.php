<?php

namespace App\Http\Services;


use App\Repositories\UserRepository;
use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $userRepository;
    protected $categoryRepository;

    public function __construct(UserRepository $userRepository, CategoryRepository $categoryRepository)
    {
        $this->userRepository = $userRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategoryList($page)
    {   
        $results = $this->categoryRepository->getCategoryList($page);
        $data = $results->transform(function ($category) {
            return [
                'id'                        => $category->id,
                'name'                      => $category->name,
                'created_datetime'          => $category->created_at,
                'last_modifyied_user'       => [
                    'user_id'  =>  $category->user->id,
                    'name'     =>  $category->user->name,
                ],
                'last_modified_datetime'    => $category->updated_at
            ];
        });
        return [
            'total'                         => $results->total(),
            'page'                          => [
                'per_page'      =>  $results->perPage(),
                'current_page'  =>  $results->currentPage(),
                'last_page'     =>  $results->lastPage(),
            ],
            'data'                          =>  $data
        ];
    }

    public function getCategoryById($categoryId) 
    {
        $category = $this->categoryRepository->getCategoryById($categoryId);
        return [
            'id'                        => $category->id,
            'name'                      => $category->name,
            'created_datetime'          => $category->created_at,
            'last_modifyied_user'       => [
                'user_id'  =>  $category->user->id,
                'name'     =>  $category->user->name,
            ],
            'last_modified_datetime'    => $category->updated_at
        ];
    }

    public function updateOrCreateCategory($user, $categoryId, $categoryName) 
    {
        $category = $this->categoryRepository->getCategoryById($categoryId);
        $data = [
            'name'         => $categoryName,
            'updated_user' => $user->id
        ];
        if($category === null) {
            return $this->categoryRepository->createCategory(
                $this->transformInputToSqlColumn($data)
            );
        }else{
            return $this->categoryRepository->updateCategory(
                $categoryId, 
                $this->transformInputToSqlColumn($data)
            );
        }
    }

    public function deleteCategory($categoryId) 
    {
        return $this->categoryRepository->deleteCategory($categoryId);
    }

    public function transformInputToSqlColumn($input, $oldData = null)
    {
        $originData = !empty($oldData) ? $oldData : null;

        return [
            'name'          => $input['name'] ?? ($originData['name'] ?? 'Name'),
            'updated_user'  => $input['updated_user'] ?? ($originData['updated_user'] ?? 1)
        ];
    }
}
