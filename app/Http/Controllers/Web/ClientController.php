<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateClientRequest;
use App\Models\Client;
use App\Services\Web\ClientService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientController extends Controller
{

    /**
     * ClientController constructor
     */
    public function __construct(private ClientService $clientService) {}

    /**
     * We return the page with all clients
     *
     * @return View
     */
    public function index(): View
    {
        return view('clients.index')->with('clients', $this->clientService->getAll());
    }

    /**
     * We return the page for creating a client
     *
     * @return View
     */
    public function create(): View {
        return view('clients.create');
    }

    /**
     * Create a client
     *
     * @param StoreUpdateClientRequest $request
     * @return RedirectResponse
     */
    public function store(StoreUpdateClientRequest $request): RedirectResponse
    {
        $this->clientService->create($request->all());

        return redirect()
            ->route('clients.index')
            ->with(['message' => 'Client has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * We return the page for editing a client
     *
     * @param Client $client
     * @return View
     */
    public function edit(Client $client): View {
        return view('clients.edit')->with('client', $client);
    }

    /**
     * Update a client
     *
     * @param Client $client
     * @param StoreUpdateClientRequest $request
     * @return RedirectResponse
     */
    public function update(Client $client, StoreUpdateClientRequest $request): RedirectResponse
    {
        $this->clientService->edit($client, $request->all());

        return redirect()
            ->route('clients.index');
    }

    /**
     * Delete a client
     *
     * @param Client $client
     * @return RedirectResponse
     */
    public function destroy(Client $client): RedirectResponse {
        $this->clientService->delete($client);

        return redirect()
            ->route('clients.index');
    }

}
