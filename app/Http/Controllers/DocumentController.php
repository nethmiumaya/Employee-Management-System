<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Project;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with(['employee', 'project'])->get();
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        $employees = Employee::all();
        $projects = Project::all();
        return view('documents.create', compact('employees', 'projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'document_id' => 'required|unique:documents,document_id',
            'employee_id' => 'required|exists:employees,employee_id',
            'doc_path' => 'required|string',
            'version' => 'required|string',
            'review_date' => 'required|date',
            'access_permission' => 'required|string',
            'project_id' => 'nullable|exists:projects,project_id',
        ]);
        Document::create($validated);
        return redirect()->route('documents.index')->with('success', 'Document created successfully.');
    }
    public function edit($document_id)
    {
        $document = Document::findOrFail($document_id);
        $employees = Employee::all();
        $projects = Project::all();
        return view('documents.edit', compact('document', 'employees', 'projects'));
    }

    public function update(Request $request, $document_id)
    {
        $document = Document::findOrFail($document_id);
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'doc_path' => 'required|string',
            'version' => 'required|string',
            'review_date' => 'required|date',
            'access_permission' => 'required|string',
            'project_id' => 'nullable|exists:projects,project_id',
        ]);
        $document->update($validated);
        return redirect()->route('documents.index')->with('success', 'Document updated successfully.');
    }

    public function show($document_id)
    {
        $document = Document::with(['employee', 'project'])->findOrFail($document_id);
        return view('documents.view', compact('document'));
    }
}
