<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCompanyRequest;
use App\Models\Company;
use App\Services\Web\CompanyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyController extends Controller
{

    /**
     * CompanyController constructor
     */
    public function __construct(private CompanyService $companyService) {}

    /**
     * We return the page with all companies
     *
     * @return View
     */
    public function index(): View
    {
        return view('companies.index')->with(['companies' => $this->companyService->getAll()]);
    }

    /**
     * We return the page for creating a company
     *
     * @return View
     */
    public function create(): View {
        return view('companies.create');
    }

    /**
     * Create a company
     *
     * @param StoreUpdateCompanyRequest $request
     * @return RedirectResponse
     */
    public function store(StoreUpdateCompanyRequest $request): RedirectResponse
    {
        $this->companyService->create($request->all());

        return redirect()
            ->route('companies.index')
            ->with(['message' => 'Company has been successfully created', 'class' => 'alert-success']);

    }

    /**
     * We return the page for editing a company
     *
     * @return View
     */
    public function edit(Company $company): View {
        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update a company
     *
     * @param Company $company
     * @param StoreUpdateCompanyRequest $request
     * @return RedirectResponse
     */
    public function update(Company $company, StoreUpdateCompanyRequest $request): RedirectResponse
    {
        $this->companyService->edit($company, $request->all());

        return redirect()
            ->route('companies.index');

    }


    /**
     * Delete a company
     *
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse {
        $this->companyService->delete($company);

        return redirect()
            ->route('companies.index');
    }




}
