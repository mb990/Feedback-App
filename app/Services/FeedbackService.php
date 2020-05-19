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

    public function store($data)
    {
        return $this->feedback->store($data);
    }
}
