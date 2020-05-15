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
}
