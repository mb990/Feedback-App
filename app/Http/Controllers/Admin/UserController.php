<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateUserRequest;
use App\Http\Requests\CreateUserRequest;
use App\Services\JobTitleService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(AdminRequest $request)
    {
        $users = auth()->user()->company->users();

        return response()->json(['users' => $users]);
    }

    public function store(CreateUserRequest $request)
    {
        $user = $this->userService->store($request);

        return response()->json(['user' => $user, 'success' => 'User is saved and profile is created.']);
    }

    public function destroy(AdminRequest $request, $id)
    {
        $this->userService->delete($id);

        return response()->json(['success' => 'User is deleted']);
    }

    public function edit(AdminRequest $request, $id)
    {
        $user = $this->userService->findWithProfile($id);

        return response()->json(['user' => $user]);
    }

    public function update(AdminUpdateUserRequest $request, $id)
    {
        $user = $this->userService->update($request, $id);

        return response()->json(['user' => $user, 'success' => 'User is updated']);
    }

    public function updatePassword(AdminUpdateUserRequest $request, $id)
    {
        $this->userService->updatePassword($request, $id);

        return response()->json(['success' => 'User password is updated']);
    }
}
