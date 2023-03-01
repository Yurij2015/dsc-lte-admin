<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CompanyResource;
use App\Models\Company;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $companies = Company::paginate();
        return CompanyResource::collection($companies);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company): LengthAwarePaginator
    {
        return $company->customers()->paginate();
    }
}
