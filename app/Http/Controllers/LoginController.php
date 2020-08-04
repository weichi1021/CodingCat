<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $account = $request->get('account');
        $password = $request->get('password');

        $attempt = Auth::attempt([
            'account'   => $account,
            'password'  => $password,
        ]);

        $user = Auth::user();
        $data = [
            'name'      => $user->name,
            'account'   => $user->account,
            'token'     => $user->api_token,
        ];

        if ($attempt) {
            return response([
                'data' => $data
            ], 200);
        } else {
            return response([
                'data' => 'Failed to login.'
            ], 500);
        }
    }
}
