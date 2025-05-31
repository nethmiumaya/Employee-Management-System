<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperAdmin;

class SuperAdminController extends Controller
{
    public function index()
    {
        $superAdmins = SuperAdmin::all();
        return view('super_admin.index', compact('superAdmins'));
    }

    public function create()
    {
        return view('super_admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'super_admin_id' => 'required|string|unique:super_admins,super_admin_id',
            'super_admin_name' => 'required|string|max:255',
        ]);

        SuperAdmin::create($validated);

        return redirect()->route('super_admins.index')->with('success', 'Super Admin created successfully!');
    }

    public function edit(SuperAdmin $superAdmin)
    {
        return view('super_admin.edit', compact('superAdmin'));
    }

    public function update(Request $request, SuperAdmin $superAdmin)
    {
        $validated = $request->validate([
            'super_admin_name' => 'required|string|max:255',
        ]);

        $superAdmin->update($validated);

        return redirect()->route('super_admins.index')->with('success', 'Super Admin updated successfully!');
    }

    public function destroy($id)
    {
        try {
            $superAdmin = SuperAdmin::findOrFail($id);
            $superAdmin->delete();

            return redirect()->route('super_admins.index')->with('success', 'Super Admin deleted successfully!');
        } catch (\Exception $e) {
            \Log::error('Error deleting Super Admin: ' . $e->getMessage());
            return back()->withErrors('An error occurred while deleting the Super Admin.');
        }
    }

    public function show(SuperAdmin $superAdmin)
    {
        return view('super_admin.show', compact('superAdmin'));
    }
}
