<?php


namespace App\Services;


use App\Repositories\ProfileRepository;

class ProfileService
{
    /**
     * @var ProfileRepository
     */
    private $profile;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var FeedbackService
     */
    private $feedbackService;

    public function __construct(ProfileRepository $profile, UserService $userService, FeedbackService $feedbackService)
    {
        $this->profile = $profile;
        $this->userService = $userService;
        $this->feedbackService = $feedbackService;
    }

    public function profileData($user)
    {
        $feedback = $this->feedbackService->allActiveForUser($user);

        $scores = [];

        $totalSkillsScore = [];

        $averageSkillsScore = [];

        foreach ($feedback as $fback) {

            foreach ($fback->skills as $skill) {

                if (!array_key_exists($skill->id, $scores)) {

                    $totalSkillsScore[$skill->id] = $skill->pivot->score;
                }

                else {

                    $totalSkillsScore[$skill->id] += $skill->pivot->score;
                }

                $scores[$skill->id][$fback->id] = $skill->pivot->score;
            }
        }

        $i = 1;

        foreach ($totalSkillsScore as $score) {

            $averageSkillsScore[$i] = number_format($score / count($feedback), 1, '.', '');

            $i++;
        }

        $data['skills_score'] = $averageSkillsScore;

        return $data;
    }
}
