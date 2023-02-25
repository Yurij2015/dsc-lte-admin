<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('customers')->orderBy('id', 'desc')->paginate(20);
        $heads = ['#', 'Name', 'Email', 'Phone', 'Number of customers', 'Action'];
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

}
