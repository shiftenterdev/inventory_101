<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees  = Employee::get();
        return view('admin.employee.index')
            ->with(compact('employees'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        Employee::create([
            'name'=>$request->name,
            'designation'=>$request->designation,
            'status'=>$request->status,
            'date_of_join'=>$request->date_of_join
        ]);
        return redirect()->back();
    }

    public function edit(Employee $employee)
    {
        return view('admin.employee.edit')
            ->with(compact('employee'));
    }

    public function destroy(Request $request,$id)
    {

    }
}
