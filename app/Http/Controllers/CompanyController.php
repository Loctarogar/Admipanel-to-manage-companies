<?php

namespace App\Http\Controllers;

use App\Company;
use App\Mail\CompanyCreatedSendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $file = $request->file('logo')->store('public/avatars');
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'website' => 'required'
        ]);
        $id = Auth::id();
        $validateData['logo'] = substr($file,7);
        $validateData['user_id'] = $id;
        $company = Company::create($validateData);
        Mail::to($request->email)->send(new CompanyCreatedSendMail());
        return redirect('company/index');
    }

    /**
     * Display the specified resource.
     *
     * @param $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($company)
    {
        $company = Company::findOrFail($company);

        return view('company.showSingle', compact('company'));
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