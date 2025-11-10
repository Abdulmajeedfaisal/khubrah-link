<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Skill;
use App\Models\Session;
use App\Models\Review;
use App\Models\Report;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users with advanced filters
     */
    public function index(Request $request)
    {
        $query = User::with(['teachingSessions', 'learningSessions']);

        // Search by name or email
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%");
            });
        }

        // Filter by role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        // Filter by registration date
        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $users = $query->latest()->paginate(20);

        // Statistics
        $stats = [
            'total' => User::count(),
            'active' => User::where('is_active', true)->count(),
            'inactive' => User::where('is_active', false)->count(),
            'admins' => User::where('role', 'admin')->count(),
        ];

        return view('admin.users.index', compact('users', 'stats'));
    }

    /**
     * Display the specified user with full details
     */
    public function show(User $user)
    {
        // Load relationships
        $user->load(['skills', 'teachingSessions', 'learningSessions', 'reviews', 'reports']);

        // User statistics
        $userStats = [
            'skills_count' => $user->skills()->count(),
            'teaching_sessions' => $user->teachingSessions()->count(),
            'learning_sessions' => $user->learningSessions()->count(),
            'completed_sessions' => $user->teachingSessions()->where('status', 'completed')->count(),
            'reviews_received' => Review::where('reviewee_id', $user->id)->count(),
            'average_rating' => Review::where('reviewee_id', $user->id)->avg('overall_rating'),
            'reports_against' => Report::where('reported_user_id', $user->id)->count(),
        ];

        // Recent activities
        $recentSessions = Session::where(function ($q) use ($user) {
            $q->where('teacher_id', $user->id)
              ->orWhere('learner_id', $user->id);
        })->latest()->take(5)->get();

        $recentReviews = Review::where('reviewee_id', $user->id)
            ->with('reviewer')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.users.show', compact('user', 'userStats', 'recentSessions', 'recentReviews'));
    }

    /**
     * Suspend user account
     */
    public function suspend(Request $request, User $user)
    {
        $request->validate([
            'reason' => 'required|string|max:500',
        ], [
            'reason.required' => 'سبب التعليق مطلوب',
            'reason.max' => 'سبب التعليق يجب ألا يتجاوز 500 حرف',
        ]);

        $user->is_active = false;
        $user->save();

        logActivity('suspended', $user, 'Admin suspended user: ' . $user->name . ' - Reason: ' . $request->reason);

        // TODO: Send notification to user

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'تم تعليق الحساب بنجاح');
    }

    /**
     * Activate user account
     */
    public function activate(User $user)
    {
        $user->is_active = true;
        $user->save();

        logActivity('activated', $user, 'Admin activated user: ' . $user->name);

        // TODO: Send notification to user

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'تم تفعيل الحساب بنجاح');
    }

    /**
     * Remove the specified user
     */
    public function destroy(User $user)
    {
        // Check if user has active sessions
        $activeSessions = Session::where(function ($q) use ($user) {
            $q->where('teacher_id', $user->id)
              ->orWhere('learner_id', $user->id);
        })->whereIn('status', ['pending', 'confirmed'])->count();

        if ($activeSessions > 0) {
            return redirect()
                ->back()
                ->with('error', 'لا يمكن حذف المستخدم لأنه لديه جلسات نشطة');
        }

        $userName = $user->name;
        $user->delete();

        logActivity('deleted', null, 'Admin deleted user: ' . $userName);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'تم حذف الحساب بنجاح');
    }
}
