<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Company;
use App\Employee;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('lastEnter');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allCompanies = Company::withTrashed()->get();
        $allEmployees = Employee::withTrashed()->get();
        return view('admin.dashboard', compact('allCompanies', 'allEmployees'));
    }

    public function getUser()
    {
        return view('admin.profile');
    }

    public function getCompanies()
    {
        $allCompanies = Company::withTrashed()->get();
        return view('admin.companies', compact('allCompanies'));
    }

    public function getEmployees()
    {
        $allEmployees = Employee::withTrashed()->get();
        return view('admin.employees', compact('allEmployees'));
    }
}
