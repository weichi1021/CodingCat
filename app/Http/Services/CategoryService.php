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

    public function getCategoryList()
    {   
        return $this->categoryRepository->getCategoryList()->transform(function ($category) {
            $updated_user = $this->userRepository->getUser($category->updated_user);
            return [
                'id'                        => $category->id,
                'name'                      => $category->name,
                'created_datetime'          => $category->created_at,
                'last_modifyied_user'       => [
                    'user_id'  =>  $updated_user->id,
                    'name'     =>  $updated_user->name,
                ],
                'last_modified_datetime'    => $category->updated_at
            ];
        });
    }

    public function getCategoryById($categoryId) 
    {
        $category = $this->categoryRepository->getCategoryById($categoryId);
        $updated_user = $this->userRepository->getUser($category->updated_user);
        return [
            'id'                        => $category->id,
            'name'                      => $category->name,
            'created_datetime'          => $category->created_at,
            'last_modifyied_user'       => [
                'user_id'  =>  $updated_user->id,
                'name'     =>  $updated_user->name,
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
