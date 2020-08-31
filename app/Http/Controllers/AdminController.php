<?php

namespace App\Http\Controllers;

use App\Http\Services\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function addUser()
    {

    }

    public function getUserList()
    {
        return response(
            $this->adminService->getUsers()
        );
    }

    public function updateUser()
    {

    }

    public function deleteUser(Request $request)
    {
        $uid = $request->get('uid');

        return response(
            $this->adminService->destroyUser($uid)
        );
    }
}
