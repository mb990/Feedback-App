<?php


namespace App\Repositories;


use App\Feedback;

class FeedbackRepository
{
    /**
     * @var Feedback
     */
    private $feedback;

    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    public function find($id)
    {
        return $this->feedback->find($id);
    }

    public function store($data)
    {
        return $this->feedback->create($data);
    }

    public function update($id, $data)
    {
        $feedback = $this->find($id);

        $feedback->update($data);
    }

    public function addSkill($id, $score)
    {
        $this->skills()->attach($id, ['score' => $score]);
    }
}
