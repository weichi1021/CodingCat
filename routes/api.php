<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function (){
    Route::get('user_list', 'AdminController@getUserList');
    Route::get('user', 'AdminController@getUser');
    Route::post('user_create', 'AdminController@addUser');
    Route::post('user_update', 'AdminController@updateUser');
    Route::get('user_delete', 'AdminController@deleteUser');
    Route::post('user_search', 'AdminController@searchUser');
});

Route::get('logout', 'LoginController@logout');
