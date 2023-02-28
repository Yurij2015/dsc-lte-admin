<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerSaveRequest;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;

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

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return JsonResponse
     */
    public function showInModal(Customer $customer): JsonResponse
    {
        return response()->json(['status' => 'success', 'data' => $customer]);
    }

    public function createForm()
    {
        return view('customer.create');
    }

    public function updateForm(Customer $customer)
    {
        return view('customer.update', ['customer' => $customer]);
    }

    public function store(Customer $customer, CustomerSaveRequest $storeRequest): JsonResponse
    {
        $customer = Customer::updateOrCreate(
            [
                'id' => $customer->id
            ],
            [
                'first_name' => $storeRequest->first_name,
                'last_name' => $storeRequest->last_name,
                'email' => $storeRequest->email,
                'phone' => $storeRequest->phone,
                'address' => $storeRequest->address,
                'city' => $storeRequest->city,
                'region' => $storeRequest->region,
                'country' => $storeRequest->country,
                'postal_code' => $storeRequest->postal_code
            ]
        );
        if ($customer) {
            return response()->json(['status' => 'success', 'data' => $customer]);
        }
        return response()->json(['status' => 'failed', 'message' => 'Failed! Customer not saved']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return JsonResponse
     */
    public function destroy(Customer $customer): JsonResponse
    {
        $customer->delete();
        return response()->json(['status' => 'success', 'data' => $customer]);
    }
}
