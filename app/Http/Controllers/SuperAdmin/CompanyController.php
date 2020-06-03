<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdminRequest;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
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

        return response()->json(['companies' => $companies]);
    }

    public function update(SuperAdminRequest $request, $id)
    {
        $this->companyService->update($request, $id);
    }
}
