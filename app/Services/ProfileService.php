<?php


namespace App\Services;


use App\Profile;
use App\Repositories\ProfileRepository;

class ProfileService
{
    /**
     * @var ProfileRepository
     */
    private $profile;

    public function __construct(ProfileRepository $profile)
    {
        $this->profile = $profile;
    }
}
