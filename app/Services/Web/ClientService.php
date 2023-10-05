<?php

namespace App\Services\Web;

use App\Models\Client;
use App\Models\Company;

class ClientService
{
    /**
     * Method that returns all clients
     *
     * @return mixed
     */
    public function getAll(): mixed {
        return Client::simplePaginate(config('app.paginate'));
    }

    /**
     * Method that create new client
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void {
        $client = Client::create($data);

        $companies = Company::whereIn('name', $data['companies'])->get();

        $client->companies()->attach($companies);

    }

    /**
     * Method that update client
     *
     * @param array $data
     * @return void
     */

    public function edit(Client $client, array $data): void {

        $companies = !empty($data['companies']) ? Company::whereIn('name', $data['companies'])->get() : [];

        $client->name = $data['name'];
        $client->surname = $data['surname'];
        $client->email = $data['email'];

        $client->save();

        $client->companies()->sync($companies);
    }

    /**
     * Method that delete client
     *
     * @param Client $client
     * @return void
     */
    public function delete(Client $client): void {
        $client->delete();
    }

}
