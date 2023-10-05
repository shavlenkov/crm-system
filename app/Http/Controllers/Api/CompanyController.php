<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResourse;
use App\Http\Resources\SimpleCompanyResourse;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompanyController extends Controller
{
    /**
     * Get all companies
     *
     * @return AnonymousResourceCollection
     */
    public function getCompanies(): AnonymousResourceCollection {
        return CompanyResourse::collection(Company::simplePaginate(config('app.paginate')));
    }

    /**
     * Get companies by client
     *
     * @param Client $client
     * @return AnonymousResourceCollection
     */
    public function getCompaniesByClient(Client $client): AnonymousResourceCollection {
        return SimpleCompanyResourse::collection($client->companies()->simplePaginate(config('app.paginate')));
    }
}
