<?php


namespace App\Repositories;


use App\User;
use Illuminate\Support\Str;

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

    public function store($request, $password)
    {
        return $this->user->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $password,
            'company_id' => $request->company_id,
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10)


        ])->assignRole('admin');
    }

    public function update($request, $user)
    {
        return $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email
        ]);
    }

    public function delete($user)
    {
        $user->delete();
    }
}
