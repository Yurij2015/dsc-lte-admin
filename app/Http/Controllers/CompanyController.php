<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanySaveRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('customers')->orderBy('id', 'desc')->paginate(20);
        $heads = ['#', 'Name', 'Email', 'Phone', 'Country','Number of customers',  'Action'];
        return view('company.index', ['companies' => $companies, 'heads' => $heads]);
    }

    public function show(Company $company)
    {
        return view('company.show', ['company' => $company]);
    }

    public function createForm()
    {
        return view('company.create');
    }

    public function updateForm(Company $company)
    {
        return view('company.update', ['company' => $company]);
    }

    public function store(CompanySaveRequest $storeRequest): RedirectResponse
    {
        Company::create($storeRequest->all());
        return redirect()->route('companies.index');
    }

    public function update(Company $company, CompanySaveRequest $saveRequest): RedirectResponse
    {
        $company->update($saveRequest->all());
        return redirect()->route('companies.index');
    }

    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();
        return redirect()->route('companies.index');
    }
}
