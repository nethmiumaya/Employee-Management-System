<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;

class LeaveController extends Controller
{

    public function index()
    {
        $leaves = Leave::with('employee')->get();
        return view('leaves.index', compact('leaves'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('leaves.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'leave_id' => 'required|string|unique:leaves,leave_id',
            'employee_id' => 'required|exists:employees,employee_id',
            'supporting_doc' => 'nullable|string',
            'reason' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Leave::create($validated);

        return redirect()->route('leaves.index')->with('success', 'Leave created successfully.');
    }

    public function show($leave_id)
    {
        $leave = Leave::with('employee')->findOrFail($leave_id);
        return view('leaves.show', compact('leave'));
    }

    public function edit($leave_id)
    {
        $leave = Leave::findOrFail($leave_id);
        $employees = Employee::all();
        return view('leaves.edit', compact('leave', 'employees'));
    }

    public function update(Request $request, $leave_id)
    {
        $leave = Leave::findOrFail($leave_id);

        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'supporting_doc' => 'nullable|string',
            'reason' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $leave->update($validated);

        return redirect()->route('leaves.index')->with('success', 'Leave updated successfully.');
    }

    public function destroy($leave_id)
    {
        $leave = Leave::findOrFail($leave_id);
        $leave->delete();

        return redirect()->route('leaves.index')->with('success', 'Leave deleted successfully.');
    }
}
