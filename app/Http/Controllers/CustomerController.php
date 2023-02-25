<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('companies')->paginate(20);
        $heads = ['#', 'Full Name','Email', 'Phone', 'City', 'Country', 'Number of companies', 'Action'];
        return view('customer.index', ['customers' => $customers, 'heads' => $heads]);
    }

    public function show(Customer $customer)
    {
        return view('customer.show', ['customer' => $customer]);
    }
}
