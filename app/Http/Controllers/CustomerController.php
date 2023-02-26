<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerSaveRequest;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Response;


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

    public function updateForm(Customer $customer)
    {
        return view('customer.update', ['customer' => $customer]);
    }
    public function store(CustomerSaveRequest $storeRequest): JsonResponse
    {
        $customer = Customer::create($storeRequest->all());
        return Response::json($customer);
    }
//    public function store(CustomerSaveRequest $storeRequest): RedirectResponse
//    {
//        Customer::create($storeRequest->all());
//        return redirect()->route('customers.index');
//    }

    public function update(Customer $customer, CustomerSaveRequest $saveRequest): RedirectResponse
    {
        $customer->update($saveRequest->all());
        return redirect()->route('customers.index');
    }
}
