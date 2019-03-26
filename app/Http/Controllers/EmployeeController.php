<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Mail\EmployeeCreatedSendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
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
        $employees = Employee::all();

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'company_id' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        Employee::create($validateData);
        Mail::to($request->email)->send(new EmployeeCreatedSendMail());

        return redirect('employee/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($employee)
    {
        $employee = Employee::findOrFail($employee);

        return view('emails.showSingle', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($employee)
    {
        $employee = Employee::find($employee);

        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $employee
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $employee)
    {
        $validateData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        Employee::whereId($employee)->update($validateData);

        return redirect('employee/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee)
    {
        $employee = Employee::find($employee);
        $employee->delete();

        return redirect('employee/index');
    }
}
