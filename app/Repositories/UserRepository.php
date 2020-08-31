<?php
namespace App\Repositories;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository
{
    /**
     * @var string|Builder|Model $model
     */
    protected $model = User::class;

    /**
     * @param $uid
     * @param $newToken
     * @return int
     */
    public function updateToken($uid, $newToken)
    {
        return $this->model
            ->where('id', $uid)->update([
            'api_token' => $newToken
        ]);
    }

    /**
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getUsers()
    {
        return $this->model
            ->orderBy('id')->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteUser($id)
    {
        return $this->model
            ->where('id', $id)->delete();
    }

    public function testUser()
    {

    }

}
