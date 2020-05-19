<?php

namespace App\Http\Controllers;

use App\Services\SkillService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @var SkillService
     */
    private $skillService;

    public function __construct(SkillService $skillService)
    {
        $this->skillService = $skillService;
    }

    public function index()
    {
        return view('homepage');
    }

    public function dashboard()
    {
        $skills = $this->skillService->all();

        return view('dashboard', compact('skills'));
    }

    public function feedback()
    {
        return view('feedback');
    }
}
