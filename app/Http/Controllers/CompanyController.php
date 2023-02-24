<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(20);
        $heads = ['Id', 'Name', 'Email', 'Phone', 'Address', 'City', 'Region', 'Country', 'Postal code'];
        return view('company.index', ['companies' => $companies, 'heads' => $heads]);
    }
}
