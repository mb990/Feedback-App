<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdminRequest;

class SuperAdminController extends Controller
{

    public function index(SuperAdminRequest $request)
    {

        return view('superadmin.control-panel');
    }
}
