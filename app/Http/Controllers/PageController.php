<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardRequest;
use App\Services\CompanyService;
use App\Services\FeedbackService;
use App\Services\SkillService;
use App\Services\UserService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var SkillService
     */
    private $skillService;
    /**
     * @var FeedbackService
     */
    private $feedbackService;
    /**
     * @var CompanyService
     */
    private $companyService;
    private $userService;

    public function __construct(SkillService $skillService,UserService $userService, FeedbackService $feedbackService, CompanyService $companyService)
    {
        $this->skillService = $skillService;
        $this->feedbackService = $feedbackService;
        $this->companyService = $companyService;
        $this->userService = $userService;
    }

    public function index()
    {
        return view('homepage');
    }

    public function dashboard(DashboardRequest $request)
    {
        $skills = $this->skillService->all();

        $users = $this->userService->teammates();

        return view('dashboard', compact(['skills', 'users']));
    }

    public function testGet(Request $request)
    {
//        return response()->json(['success' => 'Success message','result' => $request->feedback_1]);
    }

    public function feedback()
    {
        return view('feedback');
    }
}
