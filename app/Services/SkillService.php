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

    public function all()
    {
        return $this->skill->all();
    }

    public function store($request)
    {
        return $this->skill->store($request);
    }
}
