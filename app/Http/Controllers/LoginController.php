<?php

namespace App\Http\Controllers;

use App\Http\FunctionTrait\TokenTrait;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use TokenTrait;
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request)
    {
        $account = $request->get('account');
        $password = $request->get('password');

        $attempt = Auth::attempt([
            'account'   => $account,
            'password'  => $password,
        ]);

        if ($attempt) {
            $user = Auth::user();
            $data = [
                'name'      => $user->name,
                'account'   => $user->account,
                'token'     => $user->api_token,
            ];

            return response([
                'data' => $data
            ], 200);
        } else {
            return response([
                'data' => 'Failed to login.'
            ], 403);
        }
    }

    public function logout()
    {
        $result = $this->updateToken();
        Auth::logout();

        if (!$result) {
            return response([
                'data' => 'Token update failed.'
            ], 403);
        }

        return response([
            'data' => 'Logout.'
        ], 200);
    }
}
