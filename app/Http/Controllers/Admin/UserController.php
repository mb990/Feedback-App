<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(AdminRequest $request)
    {
        $users = auth()->user()->company->users();

        return response()->json(['users' => $users]);
    }
}
