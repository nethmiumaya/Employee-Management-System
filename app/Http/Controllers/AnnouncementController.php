<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\DB;
use App\Models\DepAnnounceDetail;
use App\Models\EmployeeAnnouncementDetail;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $query = Announcement::with(['departments', 'teams']);

        if ($request->has('search') && $request->search !== null) {
            $query->where('announcement_id', 'like', '%' . $request->search . '%');
        }

        $announcements = $query->get();
        return view('announcements.index', compact('announcements'));
    }

// In show()
    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $announcement = Announcement::with(['departments', 'teams'])->findOrFail($id);
        return view('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $teams = Team::all();
        $employees = \App\Models\Employee::all(); // Add this line
        return view('announcements.create', compact('departments', 'teams', 'employees')); // Add 'employees'
    }


    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'date' => 'required|date',
            'department_ids' => 'required|array',
            'department_ids.*' => 'exists:departments,department_id',
            'employee_ids' => 'required|array',
            'employee_ids.*' => 'exists:employees,employee_id',
        ]);

        DB::transaction(function () use ($request) {
            $announcement = Announcement::create([
                'content' => $request->input('content'),
                'date' => $request->input('date'),
            ]);

            foreach ($request->input('department_ids') as $departmentId) {
                DepAnnounceDetail::create([
                    'department_id' => $departmentId,
                    'announcement_id' => $announcement->announcement_id,
                ]);
            }

            foreach ($request->input('employee_ids') as $employeeId) {
                EmployeeAnnouncementDetail::create([
                    'employee_id' => $employeeId,
                    'announcement_id' => $announcement->announcement_id,
                ]);
            }
        });

        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully.');
    }

    public function update(Request $request, $id)
    {
        $announcement = Announcement::findOrFail($id);
        $request->validate([
            'content' => 'required',
            'date' => 'required|date',
            'department_ids' => 'required|array',
            'department_ids.*' => 'exists:departments,department_id',
        ]);

        DB::transaction(function () use ($request, $announcement) {
            $announcement->update([
                'content' => $request->input('content'),
                'date' => $request->input('date'),
            ]);

            DepAnnounceDetail::where('announcement_id', $announcement->announcement_id)->delete();

            foreach ($request->input('department_ids') as $departmentId) {
                DepAnnounceDetail::create([
                    'department_id' => $departmentId,
                    'announcement_id' => $announcement->announcement_id,
                ]);
            }
        });

        return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully.');
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
