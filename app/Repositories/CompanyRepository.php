<?php


namespace App\Repositories;


use App\Company;

class CompanyRepository
{
    /**
     * @var Company
     */
    private $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }
}
