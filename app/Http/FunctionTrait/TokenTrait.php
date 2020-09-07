<?php

namespace App\Http\FunctionTrait;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Trait TokenTrait
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function generateToken()
    {
        return strtoupper(md5(Hash::make(Str::random(40))));
    }

    public function updateToken()
    {
        $user = Auth::user();
        $result = $this->userRepository->updateToken($user->getAuthIdentifier(), $this->generateToken());

        return $result;
    }
}
