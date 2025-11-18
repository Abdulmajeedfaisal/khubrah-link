<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Skill;
use App\Models\Session;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard with comprehensive statistics
     */
    public function index()
    {
        // Users Statistics
        $usersStats = [
            'total' => User::count(),
            'active' => User::where('is_active', true)->count(),
            'new_today' => User::whereDate('created_at', today())->count(),
            'new_this_week' => User::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'new_this_month' => User::whereMonth('created_at', now()->month)->count(),
        ];

        // Skills Statistics
        $skillsStats = [
            'total' => Skill::count(),
            'active' => Skill::where('is_active', true)->count(),
            'by_category' => Skill::select('category_id', DB::raw('count(*) as count'))
                ->with('category:id,name_ar')
                ->groupBy('category_id')
                ->get(),
        ];

        // Sessions Statistics
        $sessionsStats = [
            'total' => Session::count(),
            'pending' => Session::where('status', 'pending')->count(),
            'confirmed' => Session::where('status', 'confirmed')->count(),
            'completed' => Session::where('status', 'completed')->count(),
            'cancelled' => Session::where('status', 'cancelled')->count(),
            'today' => Session::whereDate('scheduled_at', today())->count(),
            'this_week' => Session::whereBetween('scheduled_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
        ];

        // Reviews Statistics (Version 2 - Coming Soon)
        $reviewsStats = [
            'total' => 0,
            'approved' => 0,
            'pending' => 0,
            'average_rating' => 0,
            'high_rated' => 0,
            'low_rated' => 0,
            'coming_soon' => true,
        ];

        // Reports Statistics (Version 2 - Coming Soon)
        $reportsStats = [
            'total' => 0,
            'pending' => 0,
            'reviewing' => 0,
            'resolved' => 0,
            'rejected' => 0,
            'coming_soon' => true,
        ];

        // Categories Statistics
        $categoriesStats = [
            'total' => Category::count(),
            'active' => Category::where('is_active', true)->count(),
        ];

        // Revenue Statistics (if payment system exists)
        $revenueStats = [
            'total' => Session::where('payment_status', 'paid')->sum('price'),
            'this_month' => Session::where('payment_status', 'paid')
                ->whereMonth('created_at', now()->month)
                ->sum('price'),
            'pending' => Session::where('payment_status', 'pending')->sum('price'),
        ];

        // Recent Activities
        $recentUsers = User::latest()->take(5)->get();
        $recentSessions = Session::with(['skill', 'teacher', 'learner'])
            ->latest()
            ->take(5)
            ->get();

        // Chart Data - Last 7 days
        $last7Days = collect(range(6, 0))->map(function ($daysAgo) {
            $date = now()->subDays($daysAgo);
            return [
                'date' => $date->format('Y-m-d'),
                'date_ar' => $date->format('d/m'),
                'users' => User::whereDate('created_at', $date)->count(),
                'sessions' => Session::whereDate('created_at', $date)->count(),
                'skills' => Skill::whereDate('created_at', $date)->count(),
            ];
        });

        return view('admin.dashboard', compact(
            'usersStats',
            'skillsStats',
            'sessionsStats',
            'reviewsStats',
            'reportsStats',
            'categoriesStats',
            'revenueStats',
            'recentUsers',
            'recentSessions',
            'last7Days'
        ));
    }
}
