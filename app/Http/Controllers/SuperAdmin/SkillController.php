<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuperAdminRequest;
use App\Services\SkillService;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * @var SkillService
     */
    private $skillService;

    public function __construct(SkillService $skillService)
    {
        $this->skillService = $skillService;
    }

    public function index(SuperAdminRequest $request)
    {
        $skills = $this->skillService->all();

        return response()->json(['skills' => $skills]);
    }
}
