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

    public function addUser(Request $request)
    {
        $data = $request->all();

        return response(
            $this->adminService->createUser($data)
        );
    }

    public function getUserList()
    {
        return response(
            $this->adminService->getUsers()
        );
    }

    public function getUser(Request $request)
    {
        $uid = $request->get('uid');

        return response(
            $this->adminService->getUserById($uid)
        );
    }

    public function updateUser(Request $request)
    {
        $data = $request->all();

        return response(
            $this->adminService->updateUser($data)
        );
    }

    public function deleteUser(Request $request)
    {
        $uid = $request->get('uid');

        return response(
            $this->adminService->destroyUser($uid)
        );
    }
}
