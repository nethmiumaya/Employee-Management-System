<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::all();
        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $teams = Team::all();
        return view('announcements.create', compact('departments', 'teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'announcement_id' => 'required|unique:announcements,announcement_id',
            'content' => 'required',
            'date' => 'required|date',
            'target_team_id' => 'nullable|exists:teams,team_id',
            'department_id' => 'nullable|exists:departments,department_id',
        ]);
        Announcement::create($request->all());
        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        $departments = \App\Models\Department::all();
        $teams = \App\Models\Team::all();
        return view('announcements.edit', compact('announcement', 'departments', 'teams'));
    }

    public function update(Request $request, $id)
    {
        $announcement = Announcement::findOrFail($id);
        $request->validate([
            'content' => 'required',
            'date' => 'required|date',
            'target_team_id' => 'nullable|exists:teams,team_id',
            'department_id' => 'nullable|exists:departments,department_id',
        ]);
        $announcement->update($request->all());
        return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();
        return redirect()->route('announcements.index')->with('success', 'Announcement deleted successfully.');
    }
}
