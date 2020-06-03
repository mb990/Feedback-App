<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdminRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(SuperAdminRequest $request)
    {
        $admins = $this->userService->admins();

        return response()->json(['admins' => $admins]);
    }

    public function show(SuperAdminRequest $request, $id)
    {
        $admin = $this->userService->find($id);

        return view('superadmin.admins.single', compact('admin'));
    }
}
