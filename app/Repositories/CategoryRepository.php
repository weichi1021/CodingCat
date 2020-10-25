<?php
namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository
{
    /**
     * @var string|Builder|Model $model
     */
    protected $model = Category::class;

    /**
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCategoryList()
    {
        return $this->model
            ->orderBy('id')->get();
    }


    public function getCategoryById($categoryId)
    {
        return $this->model
            ->where('id', $categoryId)
            ->first();
    }

    /**
     * @param $data 
     * @return boolean
     */
    public function createCategory($data)
    {
        return $this->model
            ->insert($data);

        // if ($category !== null) {
        //     return $category->update($data);
        // } else {
        //     return Category::create($data);
        // }
                    
        // return Category::updateOrCreate($data);
    }

    /**
     * @param $categoryId 
     * @param $data 
     * @return boolean
     */
    public function updateCategory($categoryId, $data)
    {
        return $this->model
            ->where('id', $categoryId)
            ->update($data);
    }

    /**
     * @param $categoryId
     * @return boolean
     */
    public function deleteCategory($categoryId)
    {
        return $this->model
            ->where('id', $categoryId)
            ->delete();
    }
}
