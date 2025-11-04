<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\AnalyticsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes - Subdomain Only
|--------------------------------------------------------------------------
|
| These routes are only accessible via admin.khubrahlink.test
| Sessions are completely isolated from the main domain.
|
*/

// Admin Subdomain Routes
Route::domain(env('ADMIN_DOMAIN', 'admin.khubrahlink.test'))->group(function () {
    
    // Admin Authentication Routes (Guest only)
    Route::name('admin.')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    });

    // Admin Protected Routes
    Route::middleware(['auth', 'admin'])->name('admin.')->group(function () {
        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        // Users Management
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::post('/users/{id}/suspend', [UserController::class, 'suspend'])->name('users.suspend');
        Route::post('/users/{id}/activate', [UserController::class, 'activate'])->name('users.activate');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        
        // Reports Management
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
        Route::post('/reports/{id}/approve', [ReportController::class, 'approve'])->name('reports.approve');
        Route::post('/reports/{id}/reject', [ReportController::class, 'reject'])->name('reports.reject');
        
        // Analytics
        Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
        
        // Categories Management
        Route::get('/categories', function () {
            return view('admin.categories.index');
        })->name('categories.index');
        
        // Sessions Monitoring
        Route::get('/sessions', function () {
            return view('admin.sessions.index');
        })->name('sessions.index');
        
        // Settings
        Route::get('/settings', function () {
            return view('admin.settings');
        })->name('settings');
    });
});
