<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Services\CompanyService;
use App\Services\JobTitleService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var CompanyService
     */
    private $companyService;
    /**
     * @var JobTitleService
     */
    private $jobTitleService;

    public function __construct(CompanyService $companyService, JobTitleService $jobTitleService)
    {
        $this->companyService = $companyService;
        $this->jobTitleService = $jobTitleService;
    }

    public function index(AdminRequest $request)
    {
        $positions = $this->jobTitleService->all();

        return view('admin.index', compact(['positions']));
    }
}
