<?php

namespace App\Services\Web;

use App\Models\Company;

class CompanyService
{
    /**
     * Method that returns all companies
     *
     * @return mixed
     */
    public function getAll(): mixed {
        return Company::simplePaginate(config('app.paginate'));
    }

    /**
     * Method that create new company
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void {
        $company = Company::create($data);
    }

    /**
     * Method that update client
     *
     * @param Company $company
     * @param array $data
     * @return void
     */
    public function edit(Company $company, array $data): void {
        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->foundation_year = $data['foundation_year'];
        $company->description =  $data['description'];

        $company->save();
    }

    /**
     * Method that delete client
     *
     * @param Company $company
     * @return void
     */
    public function delete(Company $company): void {
        $company->delete();
    }


}
