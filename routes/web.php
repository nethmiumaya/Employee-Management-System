<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/employee/dashboard', function () {
    return view('employee.dashboard');
})->name('employee.dashboard');
Route::get('/super_admin/dashboard', function () {
    return view('super_admin.dashboard');
})->name('super_admin.dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


Route::resource('departments', DepartmentController::class);

require __DIR__.'/auth.php';
