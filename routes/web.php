<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

// In routes/web.php
Route::post('/register', [RegistrationController::class, 'register'])->name('register');


require __DIR__.'/auth.php';
