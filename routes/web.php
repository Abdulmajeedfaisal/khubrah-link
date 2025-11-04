<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes - Main Domain Only
Route::domain(env('APP_DOMAIN', 'khubrahlink.test'))->group(function () {
    Route::get('/', function () {
        return view('pages.landing');
    })->name('landing');

    // Browse Skills - للزوار والمستخدمين
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');

    // Public Profile - للزوار والمستخدمين
    Route::get('/profile/{username}', [PublicProfileController::class, 'show'])->name('profile.public');
});

// User Routes - Main Domain Only
Route::domain(env('APP_DOMAIN', 'khubrahlink.test'))->group(function () {
    // Dashboard - للمستخدمين المسجلين فقط (منع Admin)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified', 'prevent.admin.user'])->name('dashboard');

    // User Routes - للمستخدمين المسجلين فقط (منع Admin)
    Route::middleware(['auth', 'prevent.admin.user'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Skills Management
    Route::get('/skills/manage', function () {
        return view('skills.manage');
    })->name('skills.manage');
    
    // Sessions
    Route::get('/sessions', function () {
        return view('sessions.index');
    })->name('sessions.index');
    
    Route::get('/sessions/book/{user}', function () {
        return view('sessions.book');
    })->name('sessions.book');
    
    Route::get('/sessions/{id}', function () {
        return view('sessions.show');
    })->name('sessions.show');
    
    // Messages
    Route::get('/messages', function () {
        return view('messages.index');
    })->name('messages.index');
    
    // Reviews
    Route::get('/reviews/create/{session}', function () {
        return view('reviews.create');
    })->name('reviews.create');
    
    // Notifications
    Route::get('/notifications', function () {
        return view('notifications.index');
    })->name('notifications.index');
    
        // Settings
        Route::get('/settings', function () {
            return view('settings');
        })->name('settings');
    });
    
    // Auth Routes (Login, Register, etc.) - Main Domain Only
    require __DIR__.'/auth.php';
});

// Admin Routes
require __DIR__.'/admin.php';
