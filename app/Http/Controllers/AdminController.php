<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }
    public function show(Admin $admin)
    {
        return view('admin.show', compact('admin'));
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
    }
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'admin_name' => 'required|string|max:255',
        ]);

        $admin->update($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Admin updated successfully.');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'admin_id' => 'required|string|unique:admins,admin_id',
                'admin_name' => 'required|string|max:255',
            ]);

            Admin::create($validated);

            return redirect()->route('admin.dashboard')->with('success', 'Admin created successfully!');
        } catch (\Exception $e) {
            \Log::error('Error storing admin: ' . $e->getMessage());
            return back()->withErrors('An error occurred while adding the admin.');
        }
    }

    public function index()
    {
        // Initialize dashboard statistics with default values
        $totalEmployees = 0;    // TODO: Implement actual employee count
        $activeProjects = 0;    // TODO: Implement actual project count
        $pendingLeaves = 0;     // TODO: Implement actual pending leaves count
        $thisMonthJoinings = 0; // TODO: Implement actual new joinings count

        return view('admin.dashboard', [
            'totalEmployees' => $totalEmployees,
            'activeProjects' => $activeProjects,
            'pendingLeaves' => $pendingLeaves,
            'thisMonthJoinings' => $thisMonthJoinings
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'current_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }
            $user->password = Hash::make($request->new_password);
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}
