<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->isAdminHasNewMessages();
        $allCompanies = Company::withTrashed()->get();
        $allEmployees = Employee::withTrashed()->get();
        return view('admin.dashboard', ['allCompanies' => $allCompanies,
                'allEmployees' => $allEmployees,
            ]
        );
    }

    public function getUser()
    {
        $this->isAdminHasNewMessages();
        return view('admin.profile');
    }

    public function getCompanies()
    {
        $this->isAdminHasNewMessages();
        $allCompanies = Company::withTrashed()->get();
        return view('admin.companies', compact('allCompanies'));
    }

    public function getEmployees()
    {
        $this->isAdminHasNewMessages();
        $allEmployees = Employee::withTrashed()->get();
        return view('admin.employees', compact('allEmployees'));
    }

    public function singleCompany($id)
    {
        $company = Company::withTrashed()->findOrFail($id);

        return view('admin.singleCompany', compact('company'));
    }

    public function singleEmployee($id)
    {
        $employee = Employee::withTrashed()->findOrFail($id);

        return view('admin.singleEmployee', compact('employee'));
    }

    public function isAdminHasNewMessages()
    {
        $user = Admin::where('id', Auth::id())->get();
        $time = $user[0]->last_enter;
        //$newCompanies = Company::where('created_at', '>', $time)->get();
        //TODO : i have to query with 'DB' to get companies with 'deleted_at' not null
        $newCompanies = DB::table('companies')->where('created_at', '>', $time)->get();
        $newEmployees = DB::table('employees')->where('created_at', '>', $time)->get();
        session(['newCompanies' => $newCompanies, 'newEmployees' => $newEmployees]);
    }
}
