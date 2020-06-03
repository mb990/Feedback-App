<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowCompanyRequest;
use App\Http\Requests\SuperAdminRequest;
use App\Services\CompanyService;

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

    public function show(ShowCompanyRequest $request, $id)
    {
        $company = $this->companyService->find($id);

        return response()->json(['company' => $company]);
    }

    public function store(SuperAdminRequest $request)
    {
        $this->companyService->store($request);

        return response()->json(['request' => $request, 'success' => 'Good job, fella. You successfully stored a new company']);
    }

//    public function update(Admi)
//    {
//
//    }
}
