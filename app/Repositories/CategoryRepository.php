<?php
namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\JsonableInterface;

class CategoryRepository extends BaseRepository
{
    /**
     * @var string|Builder|Model $model
     */
    protected $model = Category::class;

    /**
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCategoryList($page)
    {
        return $this->model
            ->with('user')
            ->orderBy('id')
            ->paginate(
                5, // per page (may be get it from request)
                ['*'], // columns to select from table (default *, means all fields)
                'page', // page name that holds the page number in the query string
                $page // current page, default 1
            );
    }


    public function getCategoryById($categoryId)
    {
        return $this->model
            ->with('user')
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
