<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /**
     * @var string|Builder|Model $model
     */
    protected $model;

    public function __construct()
    {
        $this->model = new $this->model;
    }
}
