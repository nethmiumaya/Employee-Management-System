<?php

// app/Http/Controllers/ReportController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
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
}
