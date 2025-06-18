<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{

    public function index(Request $request)
    {
        $query = Employee::query();

        if ($request->filled('employee_name')) {
            $query->where('employee_name', 'like', '%' . $request->employee_name . '%');
        }
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }
        if ($request->filled('paid_status')) {
            $query->where('paid_status', $request->paid_status);
        }

        $employees = $query->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $admins = Admin::all();
        $teams = \App\Models\Team::all(); // Add this line
        return view('employees.create', compact('departments', 'admins', 'teams'));
    }


    // At the top, add:


    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_name' => 'required',
            'employee_type' => 'required',
            'employee_status' => 'required',
            'contact_no' => 'required',
            'department_id' => 'nullable',
            'admin_id' => 'nullable',
            'paid_status' => 'required',
            'role' => 'required',
            'team_ids' => 'nullable|array',
            'team_ids.*' => 'exists:teams,team_id',
        ]);

        DB::transaction(function () use ($validated, $request) {
            $employee = Employee::create($validated);

            if ($request->has('team_ids')) {
                $employee->teams()->sync($request->team_ids);
            }
        });

        return redirect()->route('employees.index')->with('success', 'Employee and teams saved successfully.');
    }

    public function show($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        return view('employees.view', compact('employee'));
    }

    public function edit($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $departments = Department::all();
        $admins = Admin::all();
        return view('employees.edit', compact('employee', 'departments', 'admins'));
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
