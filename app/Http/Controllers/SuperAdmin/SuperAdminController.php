<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdminRequest;
use App\Services\CompanyService;

class SuperAdminController extends Controller
{
    /**
     * @var CompanyService
     */
    private $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index(SuperAdminRequest $request)
    {
        $companies = $this->companyService->all();

        return view('superadmin.control-panel', compact('companies'));
    }
}
