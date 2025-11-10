<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\ReviewController;
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
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::post('/users/{user}/suspend', [UserController::class, 'suspend'])->name('users.suspend');
        Route::post('/users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        
        // Reports Management
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/{report}', [ReportController::class, 'show'])->name('reports.show');
        Route::post('/reports/{report}/reviewing', [ReportController::class, 'markAsReviewing'])->name('reports.reviewing');
        Route::post('/reports/{report}/resolve', [ReportController::class, 'resolve'])->name('reports.resolve');
        Route::post('/reports/{report}/reject', [ReportController::class, 'reject'])->name('reports.reject');
        
        // Analytics
        Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
        
        // Categories Management
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::post('/categories/{category}/toggle', [CategoryController::class, 'toggleStatus'])->name('categories.toggle');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        
        // Skills Management
        Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
        Route::get('/skills/{skill}', [SkillController::class, 'show'])->name('skills.show');
        Route::post('/skills/{skill}/toggle', [SkillController::class, 'toggleStatus'])->name('skills.toggle');
        Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');
        
        // Sessions Monitoring
        Route::get('/sessions', [SessionController::class, 'index'])->name('sessions.index');
        Route::get('/sessions/{session}', [SessionController::class, 'show'])->name('sessions.show');
        Route::post('/sessions/{session}/resolve', [SessionController::class, 'resolveDispute'])->name('sessions.resolve');
        
        // Reviews Management
        Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
        Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');
        Route::post('/reviews/{review}/toggle', [ReviewController::class, 'toggleApproval'])->name('reviews.toggle');
        Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
        
        // Settings
        Route::get('/settings', function () {
            return view('admin.settings');
        })->name('settings');
    });
});
