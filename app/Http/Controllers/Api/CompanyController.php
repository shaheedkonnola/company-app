<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\CompanyCollection;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::query()->with('createdBy','updatedBy');

        return response()->json(new CompanyCollection($companies->paginate(24)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Company Created Successfully!',
            'data' => new CompanyResource($company)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $company = Company::with('createdBy','updatedBy','employees')->find($id);

        return response()->json([
            'success' => true,
            'message' => 'Company Details',
            'data' => new CompanyResource($company)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, String $id)
    {
        $company = Company::find($id);
        $company->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Company Details Updated Successfully!',
            'data' => new CompanyResource($company)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $company = Company::find($id);
        $company->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Company Deleted Successfully!',
        ]);
    }
    
}
