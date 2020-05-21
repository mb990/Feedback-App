<?php


namespace App\Repositories;


use App\User;

class UserRepository
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function byCompany($company)
    {
        return $this->user->whereHas('profile', function ($q) use ($company) {
            $q->where('company_id', $company->id);
        })->get();
    }
}
