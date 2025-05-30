<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'report_id' => 'required|string|unique:reports,report_id',
            'report_name' => 'required|string|max:255',
            'super_admin_id' => 'required|string|exists:super_admins,super_admin_id',
        ]);

        Report::create($validated);

        return redirect()->route('reports.index')->with('success', 'Report created successfully!');
    }

    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'report_name' => 'required|string|max:255',
            'super_admin_id' => 'required|string|exists:super_admins,super_admin_id',
        ]);

        $report->update($validated);

        return redirect()->route('reports.index')->with('success', 'Report updated successfully!');
    }

    public function destroy($id)
    {
        try {
            $report = Report::findOrFail($id);
            $report->delete();

            return redirect()->route('reports.index')->with('success', 'Report deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error deleting Report: ' . $e->getMessage());
            return back()->withErrors('An error occurred while deleting the Report.');
        }
    }

    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }
}
