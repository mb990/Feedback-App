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

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function byCompany($company)
    {
        return $this->user->whereHas('profile', function ($q) use ($company) {
            $q->where('company_id', $company->id);
        })->get();
    }

    public function admins()
    {
        return $this->user->role('admin')
            ->get();
    }

    public function storeAdmin($request)
    {
        return $this->user->create($request->all())->assignRole('admin');
    }
}
