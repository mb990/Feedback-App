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

    public function all()
    {
        return $this->company->all();
    }

    public function find($id)
    {
        return $this->company->find($id);
    }

    public function store($request)
    {

        return $this->company->create($request->all());
    }

    public function update($company, $request)
    {
        $company->slug = null;

        return $company->update($request->all());
    }

    public function delete($company)
    {
        $company->delete();
    }
}
