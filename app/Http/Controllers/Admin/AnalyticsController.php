<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Skill;
use App\Models\Session;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $topProviders = User::where('is_admin', false)
            ->withCount(['teachingSessions' => function ($q) {
                $q->where('status', 'completed');
            }])
            ->having('teaching_sessions_count', '>', 0)
            ->orderBy('teaching_sessions_count', 'desc')
            ->take(10)
            ->get();

        // Top Rated Providers - Version 2 (Coming Soon)
        $topRatedProviders = collect();

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
        $totalUsers = User::where('is_admin', false)->count();
        $activeUsers = User::where('is_admin', false)
            ->whereHas('learningSessions', function ($q) use ($startDate) {
                $q->where('created_at', '>=', $startDate);
            })
            ->count();
        $retentionRate = $totalUsers > 0 ? round(($activeUsers / $totalUsers) * 100, 2) : 0;

        // Average Sessions Per User
        $totalSessions = Session::count();
        $avgSessionsPerUser = $totalUsers > 0 ? round($totalSessions / $totalUsers, 2) : 0;

        // Satisfaction Rate - Version 2 (Coming Soon)
        $satisfactionRate = 0;

        // Peak Hours Analysis
        $peakHours = Session::select(DB::raw('HOUR(scheduled_at) as hour'), DB::raw('COUNT(*) as count'))
            ->whereNotNull('scheduled_at')
            ->groupBy('hour')
            ->orderBy('count', 'desc')
            ->take(5)
            ->get();

        // Weekly Activity Heatmap (Day of week x Hour of day)
        $weeklyHeatmap = [];
        $daysOfWeek = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'];
        
        for ($day = 0; $day <= 6; $day++) {
            $weeklyHeatmap[$day] = [
                'day' => $daysOfWeek[$day],
                'hours' => []
            ];
            
            for ($hour = 0; $hour < 24; $hour++) {
                $count = Session::whereNotNull('scheduled_at')
                    ->whereRaw('DAYOFWEEK(scheduled_at) - 1 = ?', [$day])
                    ->whereRaw('HOUR(scheduled_at) = ?', [$hour])
                    ->count();
                
                $weeklyHeatmap[$day]['hours'][$hour] = $count;
            }
        }

        // Key Metrics
        $completedSessions = Session::where('status', 'completed')->count();
        $keyMetrics = [
            'retention_rate' => $retentionRate,
            'avg_sessions_per_user' => $avgSessionsPerUser,
            'satisfaction_rate' => $satisfactionRate,
            'completion_rate' => $totalSessions > 0 
                ? round(($completedSessions / $totalSessions) * 100, 2) 
                : 0,
            'growth_rate' => $this->calculateGrowthRate($days),
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
            'weeklyHeatmap',
            'days'
        ));
    }

    /**
     * Calculate growth rate compared to previous period
     */
    private function calculateGrowthRate($days)
    {
        $currentPeriodStart = now()->subDays($days);
        $previousPeriodStart = now()->subDays($days * 2);
        $previousPeriodEnd = $currentPeriodStart;

        $currentCount = User::where('is_admin', false)
            ->where('created_at', '>=', $currentPeriodStart)
            ->count();
        
        $previousCount = User::where('is_admin', false)
            ->whereBetween('created_at', [$previousPeriodStart, $previousPeriodEnd])
            ->count();

        if ($previousCount == 0) {
            return $currentCount > 0 ? 100 : 0;
        }

        return round((($currentCount - $previousCount) / $previousCount) * 100, 1);
    }
}
