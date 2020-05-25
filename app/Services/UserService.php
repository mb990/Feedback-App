<?php


namespace App\Services;


use App\Repositories\UserRepository;

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

    public function byCompany()
    {
        $company = $this->companyService->find(auth()->user()->profile->company_id);

        return $this->user->byCompany($company);
    }

    public function teammates()
    {
        $users = $this->byCompany()->pluck('id')->toArray();

        $withoutCurrent = array_diff($users, [auth()->user()->id]);

        $teamamtes = [];

        foreach ($withoutCurrent as $userId) {

            $teamamtes[] = $this->find($userId);
        }

        return $teamamtes;
    }
}
