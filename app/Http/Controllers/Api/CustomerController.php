<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $customer = Customer::paginate();
        return CustomerResource::collection($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): Customer
    {
        return $customer->load('companies');
    }
}
