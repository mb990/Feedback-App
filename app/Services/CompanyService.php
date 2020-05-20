<?php


namespace App\Services;


use App\Repositories\CompanyRepository;

class CompanyService
{
    /**
     * @var CompanyRepository
     */
    private $company;

    public function __construct(CompanyRepository $company)
    {
        $this->company = $company;
    }

    public function all()
    {
        return $this->company->all();
    }
}
