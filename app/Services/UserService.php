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

    public function byCompany()
    {
        $company = $this->companyService->find(auth()->user()->profile->company_id);

        return $this->user->byCompany($company);
    }
}
