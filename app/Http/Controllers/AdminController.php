<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.create');
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
        return view('admin.dashboard');
    }
}
