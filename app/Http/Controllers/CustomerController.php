<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('companies')->orderBy('id', 'desc')->paginate(20);
        $heads = ['#', 'Full Name', 'Email', 'Phone', 'City', 'Country', 'Number of companies', 'Action'];
        return view('customer.index', ['customers' => $customers, 'heads' => $heads]);
    }

    public function show(Customer $customer)
    {
        return view('customer.show', ['customer' => $customer]);
    }

    public function createForm()
    {
        return view('customer.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'city' => 'required',
            'region' => 'required',
            'country' => 'required',
            'postal_code' => 'required'
        ]);
        Customer::create($request->all());
        return redirect()->route('customers.index');
    }


}
