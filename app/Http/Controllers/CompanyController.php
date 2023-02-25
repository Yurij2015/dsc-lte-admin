<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(20);
        $heads = ['#', 'Name', 'Email', 'Phone', 'Address', 'Action'];
        return view('company.index', ['companies' => $companies, 'heads' => $heads]);
    }

    public function show(Company $company)
    {
        return view('company.show', ['company' => $company]);
    }
}
