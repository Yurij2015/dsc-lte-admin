<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(20);
        $heads = ['#', 'Full Name', 'Company', 'Email', 'Phone', 'Address', 'City', 'Country', 'Action'];
        return view('customer.index', ['customers' => $customers, 'heads' => $heads]);
    }

    public function show(Customer $customer)
    {
        return view('customer.show', ['customer' => $customer]);
    }
}
