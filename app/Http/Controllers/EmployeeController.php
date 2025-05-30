<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // app/Http/Controllers/EmployeeController.php

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

        \App\Models\Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }
    // app/Http/Controllers/EmployeeController.php
    public function index()
    {
        $employees = \App\Models\Employee::all();
        return view('employees.index', compact('employees'));
    }
}
