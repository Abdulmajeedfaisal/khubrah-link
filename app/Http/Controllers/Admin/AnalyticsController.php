<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Skill;
use App\Models\Session;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    /**
     * Display comprehensive analytics dashboard
     */
    public function index(Request $request)
    {
        // Date range (default: last 30 days)
        $days = $request->get('days', 30);
        $startDate = now()->subDays($days);

        // Users Growth Chart (Last 30 days)
        $usersGrowth = collect(range($days - 1, 0))->map(function ($daysAgo) {
            $date = now()->subDays($daysAgo);
            return [
                'date' => $date->format('Y-m-d'),
                'date_ar' => $date->format('d/m'),
                'count' => User::whereDate('created_at', $date)->count(),
                'cumulative' => User::whereDate('created_at', '<=', $date)->count(),
            ];
        });

        // Sessions Activity Chart (Last 30 days)
        $sessionsActivity = collect(range($days - 1, 0))->map(function ($daysAgo) {
            $date = now()->subDays($daysAgo);
            return [
                'date' => $date->format('Y-m-d'),
                'date_ar' => $date->format('d/m'),
                'booked' => Session::whereDate('created_at', $date)->count(),
                'completed' => Session::whereDate('created_at', $date)->where('status', 'completed')->count(),
                'cancelled' => Session::whereDate('created_at', $date)->where('status', 'cancelled')->count(),
            ];
        });

        // Top Skills (by sessions count)
        $topSkills = Skill::withCount('sessions')
            ->orderBy('sessions_count', 'desc')
            ->take(10)
            ->get();

        // Top Providers (by completed sessions)
        $topProviders = User::withCount(['teachingSessions' => function ($q) {
                $q->where('status', 'completed');
            }])
            ->orderBy('teaching_sessions_count', 'desc')
            ->take(10)
            ->get();

        // Top Rated Providers
        $topRatedProviders = User::withCount('reviews')
            ->withAvg('reviews', 'overall_rating')
            ->having('reviews_count', '>=', 3)
            ->orderBy('reviews_avg_overall_rating', 'desc')
            ->take(10)
            ->get();

        // Skills by Category Distribution
        $skillsByCategory = Category::withCount('skills')
            ->orderBy('skills_count', 'desc')
            ->get();

        // Monthly Revenue Trend (Last 12 months)
        $revenueByMonth = collect(range(11, 0))->map(function ($monthsAgo) {
            $date = now()->subMonths($monthsAgo);
            return [
                'month' => $date->format('Y-m'),
                'month_ar' => $date->format('m/Y'),
                'revenue' => Session::where('payment_status', 'paid')
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->sum('price'),
                'sessions' => Session::where('payment_status', 'paid')
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
            ];
        });

        // User Retention Rate
        $totalUsers = User::count();
        $activeUsers = User::whereHas('learningSessions', function ($q) {
            $q->where('created_at', '>=', now()->subDays(30));
        })->count();
        $retentionRate = $totalUsers > 0 ? round(($activeUsers / $totalUsers) * 100, 2) : 0;

        // Average Sessions Per User
        $avgSessionsPerUser = $totalUsers > 0 ? round(Session::count() / $totalUsers, 2) : 0;

        // Satisfaction Rate (Average Rating)
        $satisfactionRate = Review::where('is_approved', true)->avg('overall_rating');
        $satisfactionRate = $satisfactionRate ? round($satisfactionRate, 2) : 0;

        // Peak Hours Analysis
        $peakHours = Session::select(DB::raw('HOUR(scheduled_at) as hour'), DB::raw('COUNT(*) as count'))
            ->groupBy('hour')
            ->orderBy('count', 'desc')
            ->take(5)
            ->get();

        // Key Metrics
        $keyMetrics = [
            'retention_rate' => $retentionRate,
            'avg_sessions_per_user' => $avgSessionsPerUser,
            'satisfaction_rate' => $satisfactionRate,
            'completion_rate' => Session::where('status', 'completed')->count() > 0 
                ? round((Session::where('status', 'completed')->count() / Session::count()) * 100, 2) 
                : 0,
        ];

        return view('admin.analytics', compact(
            'usersGrowth',
            'sessionsActivity',
            'topSkills',
            'topProviders',
            'topRatedProviders',
            'skillsByCategory',
            'revenueByMonth',
            'keyMetrics',
            'peakHours',
            'days'
        ));
    }
}
