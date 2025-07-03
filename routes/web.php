<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DocumentController;


Route::get('/', function () {
    return view('dashboard');
})->middleware('guest')->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/employee/dashboard', function () {
        return view('employee.dashboard');
    })->name('employee.dashboard');
    Route::get('/super_admin/dashboard', function () {
        return view('super_admin.dashboard');
    })->name('super_admin.dashboard');

    Route::get('/admin/employees', [EmployeeController::class, 'index'])->name('admin.employees');
    Route::get('/admin/projects', [ProjectController::class, 'index'])->name('admin.projects');
    Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports');

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


    Route::get('/dashboard', function () {
        $user = auth()->check() ? auth()->user() : null;
        if ($user && $user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user && $user->role === 'super_admin') {
            return redirect()->route('super_admin.dashboard');
        }
        return redirect()->route('employee.dashboard');
    })->name('dashboard');

    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
});

Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');


Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

Route::resource('departments', DepartmentController::class);
Route::resource('admins', AdminController::class);
Route::resource('super_admins', SuperAdminController::class);
Route::resource('reports', ReportController::class);
Route::resource('teams', TeamController::class);
Route::resource('projects', ProjectController::class);
Route::resource('leaves', LeaveController::class);
Route::resource('announcements', AnnouncementController::class);

Route::get('teams/{team}/assign-employees', [TeamController::class, 'assignEmployeesForm'])->name('teams.assignEmployeesForm');
Route::post('teams/{team}/assign-employees', [TeamController::class, 'assignEmployees'])->name('teams.assignEmployees');

Route::resource('documents', DocumentController::class);
Route::get('/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admins.edit');

require __DIR__.'/auth.php';
