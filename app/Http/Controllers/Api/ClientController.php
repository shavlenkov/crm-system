<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResourse;
use App\Models\Company;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class ClientController extends Controller
{
    /**
     * Get all clients by company
     *
     * @param Company $company
     * @return AnonymousResourceCollection
     */
    public function getClientsByCompany(Company $company): AnonymousResourceCollection {
        return ClientResourse::collection($company->clients()->simplePaginate(config('app.paginate')));
    }
}
