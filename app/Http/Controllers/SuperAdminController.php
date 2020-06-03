<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuperAdminRequest;
use App\Services\CompanyService;
use App\Services\SkillService;
use App\Services\SuperAdminService;
use App\Services\UserService;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * @var CompanyService
     */
    private $companyService;
    /**
     * @var SuperAdminService
     */
    private $superAdminService;
    /**
     * @var SkillService
     */
    private $skillService;
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(CompanyService $companyService, SuperAdminService $superAdminService, SkillService $skillService, UserService $userService)
    {
        $this->companyService = $companyService;
        $this->superAdminService = $superAdminService;
        $this->skillService = $skillService;
        $this->userService = $userService;
    }

    public function index(SuperAdminRequest $request)
    {

        return view('superadmin.control-panel');
    }

    public function companies(SuperAdminRequest $request)
    {
        $companies = $this->companyService->all();

       return response()->json(['companies' => $companies]);
    }

    public function admins(SuperAdminRequest $request)
    {
        $admins = $this->userService->admins();

        return response()->json(['admins' => $admins]);
    }

    public function skills(SuperAdminRequest $request)
    {
        $skills = $this->skillService->all();

        return response()->json(['skills' => $skills]);
    }

    public function admin(SuperAdminRequest $request, $id)
    {
        $admin = $this->userService->find($id);

        return view('superadmin.admins.single', compact('admin'));
    }
}
