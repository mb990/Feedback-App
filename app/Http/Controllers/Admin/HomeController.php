<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Repositories\FeedbackDurationRepository;
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
    /**
     * @var FeedbackDurationRepository
     */
    private $feedbackDurationRepository;

    public function __construct(CompanyService $companyService, JobTitleService $jobTitleService, FeedbackDurationRepository $feedbackDurationRepository)
    {
        $this->companyService = $companyService;
        $this->jobTitleService = $jobTitleService;
        $this->feedbackDurationRepository = $feedbackDurationRepository;
    }

    public function index(AdminRequest $request)
    {
        $positions = $this->jobTitleService->all();

        $durations = $this->feedbackDurationRepository->all();

        return view('admin.index', compact(['positions', 'durations']));
    }
}
