<?php

use App\Profile;
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

    public function __construct(UserService $userService, Faker $faker)
    {
        $this->userService = $userService;
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = $this->userService->all()->pluck('id')->toArray();
        $positions = [
            'Senior Software Engineer', 'QA Automation Lead', 'Paid Intern', 'Poor non-paid Intern', 'Junior Web Developer',
            'Medior Web Developer', 'HR Manager', 'Team Leader', 'Project Manager', 'Web Designer', 'Graphic Designer'
        ];

        foreach ($users as $userId) {

            $profile = new Profile();

            $profile->user_id = $userId;
            $profile->position = $positions[array_rand($positions)];

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
