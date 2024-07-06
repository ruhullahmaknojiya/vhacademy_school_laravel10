<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;

// Group routes that require authentication and Super Admin role
Route::middleware(['auth', 'role:SuperAdmin'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');

    // Add other Super Admin routes here
    Route::get('/superadmin/profile', [SuperAdminController::class, 'profile'])->name('superadmin.profile');
    Route::get('/superadmin/settings', [SuperAdminController::class, 'settings'])->name('superadmin.settings');
});
