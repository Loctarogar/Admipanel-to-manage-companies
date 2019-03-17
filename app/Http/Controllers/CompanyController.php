<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $file = $request->file('logo')->store('avatars');
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'website' => 'required'
        ]);
        $validateData['logo'] = $file;

        $company = Company::create($validateData);

        return redirect('company/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($company)
    {
        $company = Company::findOrFail($company);
        //dd($company);
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'logo' => 'required',
            'website' => 'required'
        ]);
        Company::whereId($company)->update($validateData);

        return redirect('company/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $company
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($company)
    {
        $company = Company::find($company);
        $company->delete();

        return redirect('company/index');
    }
}