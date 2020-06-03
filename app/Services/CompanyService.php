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

    public function find($id)
    {
        return $this->company->find($id);
    }

    public function store($request)
    {
        return $this->company->store($request);
    }

    public function update($request, $id)
    {
        $company = $this->company->find($id);

        return $this->company->update($company, $request);
    }

    public function delete($id)
    {
        $company = $this->find($id);

        return $this->company->delete($company);
    }
}
