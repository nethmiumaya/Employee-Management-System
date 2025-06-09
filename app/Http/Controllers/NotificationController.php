<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::orderBy('timestamp', 'desc')->get();
        return response()->json(['notifications' => $notifications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'message' => 'required|string',
            'type' => 'required|string',
            'delivery_channel' => 'required|string',
            'employee_ids' => 'required|array',
            'employee_ids.*' => 'exists:employees,employee_id',
        ]);

        $notification = Notification::create([
            'notifi_id' => uniqid(),
            'message' => $data['message'],
            'type' => $data['type'],
            'delivery_channel' => $data['delivery_channel'],
            'timestamp' => now(),
        ]);

        $notification->employees()->attach($data['employee_ids']);

        return response()->json(['success' => true, 'notification' => $notification], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $notification = Notification::with('employees')->findOrFail($id);
        return response()->json(['notification' => $notification]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function getEmployeeNotifications($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();
        $notifications = $employee->notifications()->orderBy('timestamp', 'desc')->get();

        return response()->json(['notifications' => $notifications]);
    }

    public function myNotifications(Request $request)
    {
        $employee = $request->user()->employee; // Assumes User hasOne Employee
        if (!$employee) {
            return response()->json(['notifications' => []]);
        }
        $notifications = $employee->notifications()->orderBy('timestamp', 'desc')->get();
        return response()->json(['notifications' => $notifications]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
