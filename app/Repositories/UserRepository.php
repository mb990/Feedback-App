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

    public function findWithProfile($id)
    {
        return $this->user->with('profile')
            ->find($id);
    }

//    public function byCompany($company)
//    {
//        return $this->user->where('company_id', $company->id)
//            ->get();
//    }

    public function admins()
    {
        return $this->user->role('admin')
            ->get();
    }

    public function store($request, $password)
    {
       $user = $this->user->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $password,
            'company_id' => $request->company_id,
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10)
       ]);

       $user->profile()->create([
            'job_title_id' => $request->job_title_id,
            'picture' => 'https://lorempixel.com/640/480/?24742'
       ]);

//        if ($picture) {
//
//            $user->profile()->update([
//                'picture' => $picture
//            ]);
//        }

            return $user;
    }

    public function storePicture($picture, $user)
    {
        return $user->profile()->update([
            'picture' => $picture
        ]);
    }

    public function update($request, $user, $picture = null)
    {
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email
        ]);

        $user->profile()->update([
            'job_title_id' => $request->job_title_id,
        ]);

        if ($picture) {

            $user->profile()->update([
            'picture' => $picture
            ]);
        }

        return $user;
    }

    public function updatePassword($password, $user)
    {
        return $user->update([
           'password' => $password
        ]);
    }

    public function delete($user)
    {
        $user->delete();
    }

    public function uploadPicture($picture, $user)
    {
        return $user->profile()->update([
            'picture' => $picture
        ]);
    }
}
