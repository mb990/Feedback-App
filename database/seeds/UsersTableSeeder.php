<?php

use App\Services\CompanyService;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * @var \App\Services\CompanyService
     */
    private $companyService;
    /**
     * @var Faker
     */
    private $faker;

    public function __construct(CompanyService $companyService, Faker $faker)
    {
        $this->companyService = $companyService;
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $companies = $this->companyService->all()->pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {

            $user = new User();

            $user->first_name = $this->faker->firstName;
            $user->last_name = $this->faker->lastName;
            $user->email = $this->faker->unique()->safeEmail;
            $user->email_verified_at = now();
            $user->password = Hash::make(12345678);
            $user->remember_token = Str::random(10);

            $user->save();
        }
    }
}
