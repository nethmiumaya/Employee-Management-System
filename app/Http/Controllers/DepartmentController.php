<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'destroy']);
    }

    public function index(Request $request)
    {
        $query = Department::query();

        if ($request->filled('department_name')) {
            $query->where('department_name', 'like', '%' . $request->department_name . '%');
        }

        $departments = $query->orderBy('department_name')->paginate(10);
        $departments->appends($request->all());

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

   public function store(Request $request)
   {
       $request->validate([
           'department_name' => 'required|string|max:255',
       ]);

       Department::create($request->only('department_name'));
       return redirect()->route('departments.index')->with('success', 'Department created successfully.');
   }

    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
        ]);

        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
