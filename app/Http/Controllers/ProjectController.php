<?php

// app/Http/Controllers/ProjectController.php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('projects.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|unique:projects,project_id',
            'project_name' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,team_id',
        ]);
        Project::create($request->all());
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $teams = Team::all();
        return view('projects.edit', compact('project', 'teams'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,team_id',
        ]);
        $project->update($request->all());
        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
