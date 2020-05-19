<?php


namespace App\Repositories;


use App\Skill;

class SkillRepository
{
    /**
     * @var Skill
     */
    private $skill;

    public function __construct(Skill $skill)
    {
        $this->skill = $skill;
    }

    public function all()
    {
        return $this->skill->all();
    }
}
