<?php


namespace App\Services;


use App\Repositories\FeedbackRepository;

class FeedbackService
{
    /**
     * @var FeedbackRepository
     */
    private $feedback;

    public function __construct(FeedbackRepository $feedback)
    {
        $this->feedback = $feedback;
    }

    public function find($id)
    {
        return $this->feedback->find($id);
    }

    public function store($data)
    {
        // svaki skill iz feedback-a dodaj u feedback - addSkill

        return $this->feedback->store($data);
    }

//    public function update($id, $data)
//    {
//        return $this->feedback->update($id, $data);
//    }

    public function addSkill($id, $score)
    {
        return $this->feedback->addSkill($id, $score);

    }
}
