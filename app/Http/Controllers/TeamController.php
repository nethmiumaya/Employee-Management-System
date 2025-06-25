<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('teams.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // In TeamController.php
    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required|string|max:255',
            'employee_ids' => 'nullable|array',
            'employee_ids.*' => 'exists:employees,employee_id',
        ]);

        $team = Team::create($request->only(['team_name']));

        if ($request->has('employee_ids')) {
            $team->employees()->sync($request->employee_ids);
        }

        return redirect()->route('teams.index')->with('success', 'Team created and employees assigned successfully.');
    }

    /**
     * Display the specified resource.
     */
    // app/Http/Controllers/TeamController.php

    public function show($id)
    {
        $team = Team::findOrFail($id);
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        $employees = \App\Models\Employee::all();
        return view('teams.edit', compact('team', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $request->validate([
            'team_name' => 'required|string|max:255',
            'employee_id' => 'nullable|exists:employees,employee_id',
        ]);
        $team->update($request->all());
        return redirect()->route('teams.index')->with('success', 'Team updated successfully.');
    }
    public function assignEmployeesForm($team_id)
    {
        $team = Team::findOrFail($team_id);
        $employees = Employee::all();
        return view('teams.assign_employees', compact('team', 'employees'));
    }


    public function assignEmployees(Request $request, $team_id)
    {
        $request->validate([
            'employee_ids' => 'required|array',
            'employee_ids.*' => 'exists:employees,employee_id',
        ]);

        DB::transaction(function () use ($request, $team_id) {
            $team = Team::findOrFail($team_id);
            $team->employees()->sync($request->employee_ids);
        });

        return redirect()->route('teams.show', $team_id)->with('success', 'Employees assigned successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully.');
    }

}
