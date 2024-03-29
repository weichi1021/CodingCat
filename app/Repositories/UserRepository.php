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
     * @param $uid
     * @return Builder|Model|object|null
     */
    public function getUser($uid)
    {
        return $this->model
            ->where('id', $uid)
            ->first();
    }

    /**
     * @param $user
     * @return bool
     */
    public function createUser($user)
    {
        return $this->model
            ->insert($user);
    }

    /**
     * @param $uid
     * @param $data
     * @return int
     */
    public function updateUser($uid, $data)
    {
        return $this->model
            ->where('id', $uid)
            ->update($data);
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

}
