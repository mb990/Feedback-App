<?php


namespace App\Services;


use App\Repositories\FeedbackRepository;

class FeedbackService
{
    /**
     * @var FeedbackRepository
     */
    private $feedback;
    /**
     * @var SkillService
     */
    private $skillService;

    public function __construct(FeedbackRepository $feedback, SkillService $skillService)
    {
        $this->feedback = $feedback;
        $this->skillService = $skillService;
    }

    public function find($id)
    {
        return $this->feedback->find($id);
    }

    public function store($request)
    {

        return $this->feedback->store($request);
    }

    public function addSkill($feedback, $id, $score)
    {
        return $this->feedback->addSkill($feedback, $id, $score);
    }

    public function saveData($request)
    {
        $feedback = $this->store($request);

        $skills = $request->skills;

        foreach ($request->ratings as $rating) {

            $this->addSkill($feedback, $skills[0]['id'], $rating);

            array_shift($skills);
        }
    }

    public function check()
    {
        //ako user nije napravio feedback za ovog teammate-a, da moze da napravi, ako vec ima, da samo ispise podatke.
    }
}
