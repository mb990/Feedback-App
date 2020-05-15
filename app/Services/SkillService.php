<?php


namespace App\Services;


use App\Repositories\SkillRepository;

class SkillService
{
    /**
     * @var SkillRepository
     */
    private $skill;

    public function __construct(SkillRepository $skill)
    {
        $this->skill = $skill;
    }
}
