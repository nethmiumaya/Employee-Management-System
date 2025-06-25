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

   // public function store(Request $request)
   public function store(Request $request)
   {
       $validated = $request->validate([
           'employee_id' => 'required|exists:employees,employee_id',
           'doc_path' => 'required|file',
           'version' => 'required|string',
           'review_date' => 'required|date',
           'access_permission' => 'required|string',
           'project_id' => 'nullable|exists:projects,project_id',
       ]);

       if ($request->hasFile('doc_path')) {
           $path = $request->file('doc_path')->store('documents', 'public');
           $validated['doc_path'] = $path;
       }

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
            'doc_path' => 'nullable|file',
            'version' => 'required|string',
            'review_date' => 'required|date',
            'access_permission' => 'required|string',
            'project_id' => 'nullable|exists:projects,project_id',
        ]);

        if ($request->hasFile('doc_path')) {
            $path = $request->file('doc_path')->store('documents');
            $validated['doc_path'] = $path;
        } else {
            unset($validated['doc_path']);
        }

        $document->update($validated);
        return redirect()->route('documents.index')->with('success', 'Document updated successfully.');
    }

    public function show($document_id)
    {
        $document = Document::with(['employee', 'project'])->findOrFail($document_id);
        return view('documents.view', compact('document'));
    }
    public function destroy($document_id)
    {
        $document = Document::findOrFail($document_id);
        $document->delete();
        return redirect()->route('documents.index')->with('success', 'Document deleted successfully.');
    }
}
