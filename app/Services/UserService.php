<?php


namespace App\Services;


use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Storage;

class UserService
{
    /**
     * @var UserRepository
     */
    private $user;
    /**
     * @var CompanyService
     */
    private $companyService;

    public function __construct(UserRepository $user, CompanyService $companyService)
    {
        $this->user = $user;
        $this->companyService = $companyService;
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
        return $this->user->findWithProfile($id);
    }

//    public function byCompany()
//    {
//        $company = $this->companyService->find(auth()->user()->company_id);
//
//        return $this->user->byCompany($company);
//    }
//
//    public function teammates()
//    {
//        $users = $this->byCompany()->pluck('id')->toArray();
//
//        $withoutCurrent = array_diff($users, [auth()->user()->id]);
//
//        $teamamtes = [];
//
//        foreach ($withoutCurrent as $userId) {
//
//            $teamamtes[] = $this->find($userId);
//        }
//
//        return $teamamtes;
//    }

    public function admins()
    {
        return $this->user->admins();
    }

    public function hashPassword($value)
    {
        return \Hash::make($value);
    }

    public function store($request)
    {
        $password = $this->hashPassword($request->password);

        $user = $this->user->store($request, $password);

        if ($request->picture) {

            $pictureFile = $this->uploadPicture($request, $user);

            return $this->user->storePicture($pictureFile, $user);
        }

        return $user;
    }

    public function delete($id)
    {
        return $this->user->delete($this->find($id));
    }

    public function update($request, $id)
    {
        $user = $this->find($id);

        if ($request->picture) {

            $pictureFile = $this->uploadPicture($request, $id);

            return $this->user->update($request, $user, $pictureFile);
        }

        return $this->user->update($request, $this->find($id));
    }

    public function updatePassword($request, $id)
    {
        $password = $this->hashPassword($request->password);

        return $this->user->updatePassword($password, $this->find($id));
    }

    public function createAdmin($request)
    {
        return $this->store($request)->assignRole('admin');
    }

    public function uploadPicture($request, $user)
    {
        $picture = $request->file('picture');

        $name = $user . '.' . $picture->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('profile-pictures/' . $user->company->name, $picture, $name);

        $pictureFile = asset('storage/profile-pictures/' . $user->company->name . '/' . $name);

        return $this->user->uploadPicture($pictureFile, $user);
    }

    public function highestAverageFeedbackScore()
    {
        $company = auth()->user()->company;

        $data = ['score' => 0];

        foreach ($company->users() as $user) {

            if ($user->averageFeedbackScore() > $data['score']) {

                $data['score'] = $user->averageFeedbackScore();

                $data['user'] = $user->first_name . ' ' . $user->last_name;
            }
        }

        return $data;
    }

    public function lowestAverageFeedbackScore()
    {
        $company = auth()->user()->company;

        $data = [];

        foreach ($company->users() as $user) {

            if ($user->averageFeedbackScore()) {

                if (!isset($data['score'])) {

                    $data['score'] = $user->averageFeedbackScore();

                    $data['user'] = $user->first_name . ' ' . $user->last_name;
                }

                else {

                    if ($user->averageFeedbackScore() < $data['score']) {

                        $data['score'] = $user->averageFeedbackScore();

                        $data['user'] = $user->first_name . ' ' . $user->last_name;
                    }

                }
            }

        }

        return $data;
    }
}
