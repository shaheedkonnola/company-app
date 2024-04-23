<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(24);

        return response()->view('company.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return response()->view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        Company::create(array_merge($request->validate(),['created_by' => auth()->user()->id, 'updated_by' =>  auth()->user()->id]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return response()->view('company.show',compact($company));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return response()->view('company.edit',compact($company));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update(array_merge($request->validate(),['updated_by' =>  auth()->user()->id]));

        return response()->view('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return response()->view('company.index');
    }
    
}
