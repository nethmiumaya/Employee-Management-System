<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|unique:employees,employee_id',
            'employee_name' => 'required',
            'employee_type' => 'required',
            'employee_status' => 'required',
            'contact_no' => 'required',
            'department_id' => 'nullable',
            'admin_id' => 'nullable',
            'paid_status' => 'required',
            'team_id' => 'nullable',
            'role' => 'required',
        ]);
        Employee::create($validated);
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        return view('employees.view', compact('employee'));
    }

    public function edit($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $validated = $request->validate([
            'employee_name' => 'required',
            'employee_type' => 'required',
            'employee_status' => 'required',
            'contact_no' => 'required',
            'department_id' => 'nullable',
            'admin_id' => 'nullable',
            'paid_status' => 'required',
            'team_id' => 'nullable',
            'role' => 'required',
        ]);
        $employee->update($validated);
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
