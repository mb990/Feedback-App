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

    public function store($request)
    {
        return $this->feedback->create([
            'creator_id' => auth()->user()->id,
            'target_user_id' => 1,
            'comment_wrong' => $request->data['feedback_1'],
            'comment_improve' => $request->data['feedback_2']
        ]);
    }

    public function addSkill($feedback, $id, $score)
    {
        $feedback->skills()->attach($id, ['score' => $score]);
    }
}
