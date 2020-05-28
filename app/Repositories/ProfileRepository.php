<?php


namespace App\Repositories;


use App\Profile;

class ProfileRepository
{
    /**
     * @var Profile
     */
    private $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

//    public function averageScore($user)
//    {
//        return $user->
//    }
}
