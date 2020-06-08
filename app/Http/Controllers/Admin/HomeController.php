<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var CompanyService
     */
    private $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index(AdminRequest $request)
    {
        $companyMembers = $this->companyService->users(auth()->user()->company->id);

        return view('admin.index', compact(['companyMembers']));
    }
}
