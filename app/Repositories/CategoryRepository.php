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
}
