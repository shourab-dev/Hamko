<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Shift;
use Illuminate\Http\Request;

/**
 * EmployeeController handles employee-related operations.
 */
class EmployeeController extends Controller
{
    /**
     * Displays the add or edit employee form.
     *
     * @param int|null $id Employee ID (optional)
     * @return \Illuminate\View\View
     */
    function addOrEdit($id = null)
    {
        $employee = null;
        $shifts = Shift::where('status', true)->get();
        return view('Employee.AddEmployee', compact('employee', 'shifts'));
    }

    /**
     * Stores or updates an employee record.
     *
     * @param \Illuminate\Http\Request $request Request object
     * @param int|null $id Employee ID (optional)
     * @return \Illuminate\Http\RedirectResponse
     *
     * @example
     *  Create a new employee
     * $request = new Request(['name' => 'John Doe', 'phone' => '1234567890', 'email' => 'john@example.com', 'shift_id' => 1]);
     * $this->storeOrUpdate($request);
     *
     *  Update an existing employee
     * $request = new Request(['name' => 'Jane Doe', 'phone' => '9876543210', 'email' => 'jane@example.com', 'shift_id' => 2]);
     * $this->storeOrUpdate($request, 1);
     */
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

    /**
     * Displays a paginated list of all employees.
     *
     * @return \Illuminate\View\View
     */
    function allEmployees()
    {
        $employees = Employee::paginate(20);
        return view('Employee.ManageEmployee', compact('employees'));
    }
}
