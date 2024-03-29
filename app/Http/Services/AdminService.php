<?php

namespace App\Http\Services;

use App\Http\FunctionTrait\TokenTrait;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    use TokenTrait;
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsers()
    {
        // TODO: Articles Total(need to join articles sql), Link, Role
        return $this->userRepository->getUsers()->transform(function ($user) {
            return [
                'id'                        => $user->id,
                'avatar'                    => $user->pic,
                'name'                      => $user->name,
                'description'               => $user->info,
                'email'                     => $user->email,
                'github'                    => $user->github,
                'facebook'                  => $user->facebook,
                'created_datetime'          => $user->created_at,
                'last_modified_datetime'    => $user->updated_at
            ];
        });
    }

    public function createUser($data)
    {
        return $this->userRepository->createUser([
            $this->transformInputToSqlColumn($data)
        ]);
    }

    public function updateUser($data)
    {
        $uid = 0;
        $updateArray = array();
        foreach ($data as $index => $item) {
            if ($index == 'id') {
                $uid = $item;
            } else {
                $updateArray[$index] = $item;
            }
        }

        $user = $this->userRepository->getUser($uid);
        $updateArray = $this->transformInputToSqlColumn($updateArray, $user);

        return $this->userRepository->updateUser($uid, $updateArray);
    }

    public function destroyUser($id)
    {
        // TODO: relation delete
        return $this->userRepository->deleteUser($id);
    }

    public function transformInputToSqlColumn($input, $oldData = null)
    {
        $originData = !empty($oldData) ? $oldData : null;

        return [
            'account'       => $input['account'] ?? ($originData['account'] ?? 'abc'),
            'password'      => Hash::make($input['password'])?? $originData['password'],
            'name'          => $input['name'] ?? ($originData['name'] ?? 'AAA'),
            'pic'           => $input['avatar'] ?? $originData['pic'] ?? '',
            'info'          => $input['description'] ?? $originData['info'] ?? '',
            'email'         => $input['email'] ?? $originData['email'] ?? '',
            'github'        => $input['github'] ?? $originData['github'] ?? '',
            'facebook'      => $input['facebook'] ?? $originData['facebook'] ?? '',
            'api_token'     => $input['api_token'] ?? $originData['api_token'] ?? $this->generateToken()
        ];
    }
}
