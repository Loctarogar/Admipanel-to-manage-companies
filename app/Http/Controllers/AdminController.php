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
        if(null !== $time){
            $newCompanies = DB::table('companies')->where('created_at', '>', $time)->get();
            $newEmployees = DB::table('employees')->where('created_at', '>', $time)->get();
            session(['newCompanies' => $newCompanies, 'newEmployees' => $newEmployees]);
        }
    }

    /**
     * @param $company
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyCompany($company)
    {
        $company = Company::find($company);
        $company->delete();

        return redirect('admin/companies');
    }

    public function restoreCompany($company)
    {
        $company = Company::withTrashed()->find($company);
        $company->deleted_at = null;
        $company->save();

        return redirect('admin/companies');
    }

    public function destroyEmployee($employee)
    {
        $company = Employee::find($employee);
        $company->delete();

        return redirect('admin/employees');
    }

    public function restoreEmployee($employee)
    {
        $company = Employee::withTrashed()->find($employee);
        $company->deleted_at = null;
        $company->save();

        return redirect('admin/employees');
    }
}
