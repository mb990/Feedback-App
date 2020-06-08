<?php

use App\Profile;
use App\Services\JobTitleService;
use App\Services\UserService;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{

    /**
     * @var \App\Services\UserService
     */
    private $userService;
    /**
     * @var Faker
     */
    private $faker;
    /**
     * @var \App\Services\JobTitleService
     */
    private $jobTitleService;

    public function __construct(UserService $userService, Faker $faker, JobTitleService $jobTitleService)
    {
        $this->userService = $userService;
        $this->faker = $faker;
        $this->jobTitleService = $jobTitleService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = $this->userService->all()->pluck('id')->toArray();
        $positions = $this->jobTitleService->all()->pluck('id')->toArray();

        foreach ($users as $userId) {

            $profile = new Profile();

            $profile->user_id = $userId;
            $profile->job_title_id = $positions[array_rand($positions)];

//            $company = $this->companyService->find($profile->company_id);
//            $directory = 'profile-pictures/' . $company->name;
//            if (!Storage::exists($directory)) {
//                Storage::makeDirectory($directory);
//            }
//            $profile->picture = $this->faker->image($directory);
            $profile->picture = $this->faker->imageUrl();

            $profile->save();
        }
    }
}
