<?php

namespace App\Http\Controllers;

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
     * @var UserService
     */
    private $userService;

    public function __construct(SkillService $skillService, UserService $userService)
    {
        $this->skillService = $skillService;
        $this->userService = $userService;
    }

    public function index()
    {
        return view('homepage');
    }

    public function dashboard(Request $request)
    {
        $skills = $this->skillService->all();

//        $users = $this->userService->byCompany($company);

        $users = \GuzzleHttp\json_encode($this->userService->all()); // za test

        return view('dashboard', compact(['skills', 'users']));
    }

    public function test(Request $request)
    {
        return response()->json(['success' => 'Success message','result' => $request->feedback_1]);
    }

    public function feedback()
    {
        return view('feedback');
    }
}
