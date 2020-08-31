<?php

namespace App\Http\Services;

use App\Repositories\UserRepository;

class AdminService
{
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
                'created_datetime'          => $user->created_at,
                'last_modified_datetime'    => $user->updated_at
            ];
        });
    }

    public function destroyUser($id)
    {
        // TODO: relation delete
        return $this->userRepository->deleteUser($id);
    }
}
