<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Shift;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    function addOrEdit($id = null)
    {
        $employee = null;
        $shifts = Shift::where('status', true)->get();
        return view('Employee.AddEmployee', compact('employee', 'shifts'));
    }


    function storeOrUpdate(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        $employee = Employee::findOrNew($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->shift_id = $request->shift_id;
        $employee->save();


        return back();
    }


    function allEmployees()
    {
        $employees = Employee::paginate();
        return view('Employee.ManageEmployee', compact('employees'));
    }
}
