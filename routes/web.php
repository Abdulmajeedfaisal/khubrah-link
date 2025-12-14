<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Public Routes - Main Domain Only
Route::domain(env('APP_DOMAIN', 'khubrahlink.test'))->group(function () {
    Route::get('/', function () {
        $categories = \App\Models\Category::active()->ordered()->limit(8)->get();
        
        // Calculate real statistics
        $stats = [
            'users' => \App\Models\User::count(),
            'skills' => \App\Models\Skill::active()->count(),
            'sessions' => \App\Models\Session::where('status', 'completed')->count(),
        ];
        
        return view('pages.landing', compact('categories', 'stats'));
    })->name('landing');

    // Browse Skills - للزوار والمستخدمين
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    
    // Skills Management - للمستخدمين المسجلين (يجب أن يأتي قبل skills/{skill})
    Route::get('/skills/manage', [SkillController::class, 'manage'])->middleware('auth')->name('skills.manage');
    
    // Skill Details - للزوار والمستخدمين (يمكن للزائر رؤية التفاصيل، لكن الحجز يتطلب تسجيل دخول)
    Route::get('/skills/{skill}', [SkillController::class, 'show'])->name('skills.show');
    
    // Public Profile - للزوار والمستخدمين
    Route::get('/profile/{username}', [PublicProfileController::class, 'show'])->name('profile.public');
    
    // Footer Pages - للزوار والمستخدمين
    Route::get('/about', function () {
        return view('pages.about');
    })->name('about');
    
    Route::get('/terms', function () {
        return view('pages.terms');
    })->name('terms');
    
    Route::get('/privacy', function () {
        return view('pages.privacy');
    })->name('privacy');
    
    Route::get('/faq', function () {
        return view('pages.faq');
    })->name('faq');
    
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
});

// User Routes - Main Domain Only
Route::domain(env('APP_DOMAIN', 'khubrahlink.test'))->group(function () {
    // Dashboard - للمستخدمين المسجلين والموثقين فقط
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    // User Routes - للمستخدمين المسجلين والموثقين فقط
    Route::middleware(['auth', 'verified'])->group(function () {
        // Profile - يجب أن تكون قبل profile/{username}
        Route::get('/my-profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/my-profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/my-profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/my-profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        
        // Skills Management (manage route moved to public section for correct order)
        Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
        Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('skills.update');
        Route::post('/skills/{skill}/toggle', [SkillController::class, 'toggleStatus'])->name('skills.toggle');
        Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');
        
        // Sessions
        Route::get('/sessions', [App\Http\Controllers\SessionController::class, 'index'])->name('sessions.index');
        Route::get('/sessions/book/{user}', [App\Http\Controllers\SessionController::class, 'create'])->name('sessions.book');
        Route::post('/sessions', [App\Http\Controllers\SessionController::class, 'store'])->name('sessions.store');
        Route::get('/sessions/{session}', [App\Http\Controllers\SessionController::class, 'show'])->name('sessions.show');
        Route::post('/sessions/{session}/confirm', [App\Http\Controllers\SessionController::class, 'confirm'])->name('sessions.confirm');
        Route::post('/sessions/{session}/complete', [App\Http\Controllers\SessionController::class, 'complete'])->name('sessions.complete');
        Route::post('/sessions/{session}/cancel', [App\Http\Controllers\SessionController::class, 'cancel'])->name('sessions.cancel');
        Route::post('/sessions/{session}/reschedule', [App\Http\Controllers\SessionController::class, 'reschedule'])->name('sessions.reschedule');
        
        // Messages
        Route::get('/messages', [App\Http\Controllers\MessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{user}', [App\Http\Controllers\MessageController::class, 'show'])->name('messages.show');
        Route::post('/messages', [App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');
        Route::post('/messages/{conversation}/read', [App\Http\Controllers\MessageController::class, 'markAsRead'])->name('messages.read');
        
        // Reviews
        Route::get('/reviews/create/{session}', [App\Http\Controllers\ReviewController::class, 'create'])->name('reviews.create');
        Route::post('/reviews/{session}', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');
        Route::put('/reviews/{review}', [App\Http\Controllers\ReviewController::class, 'update'])->name('reviews.update');
        Route::delete('/reviews/{review}', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('reviews.destroy');
        
        // Reports
        Route::post('/reports', [App\Http\Controllers\ReportController::class, 'store'])->name('reports.store');
        
        // Notifications
        Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
        Route::post('/notifications/{id}/read', [App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.read');
        Route::post('/notifications/read-all', [App\Http\Controllers\NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
        Route::get('/notifications/count', [App\Http\Controllers\NotificationController::class, 'getUnreadCount'])->name('notifications.count');
        Route::delete('/notifications/{id}', [App\Http\Controllers\NotificationController::class, 'destroy'])->name('notifications.destroy');
        
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
