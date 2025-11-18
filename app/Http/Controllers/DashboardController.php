<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the user dashboard.
     */
    public function index()
    {
        $user = auth()->user();
        
        // Calculate User Statistics
        $userStats = [
            'total_skills' => $user->skills()->count(),
            'active_skills' => $user->skills()->where('is_active', true)->count(),
            'total_sessions' => $user->teachingSessions()->count() + $user->learningSessions()->count(),
            'upcoming_sessions' => $user->learningSessions()
                ->whereIn('status', ['pending', 'confirmed'])
                ->where('scheduled_at', '>', now())
                ->count(),
            'completed_sessions' => $user->teachingSessions()
                ->where('status', 'completed')
                ->count(),
            'average_rating' => round($user->reviews()->avg('overall_rating') ?? 0, 1),
            'total_reviews' => $user->reviews()->count(),
            'unread_messages' => Message::whereHas('conversation', function ($query) use ($user) {
                $query->where('user1_id', $user->id)
                      ->orWhere('user2_id', $user->id);
            })
            ->where('sender_id', '!=', $user->id)
            ->where('is_read', false)
            ->count(),
        ];
        
        // Get Upcoming Sessions (next 5)
        $upcomingSessions = $user->learningSessions()
            ->with(['skill', 'teacher'])
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('scheduled_at', '>', now())
            ->orderBy('scheduled_at', 'asc')
            ->limit(5)
            ->get();
        
        // Get Recent Conversations (last 5)
        $recentConversations = Conversation::where(function ($query) use ($user) {
            $query->where('user1_id', $user->id)
                  ->orWhere('user2_id', $user->id);
        })
        ->with(['user1', 'user2', 'messages' => function ($query) {
            $query->latest()->limit(1);
        }])
        ->orderBy('updated_at', 'desc')
        ->limit(5)
        ->get();
        
        return view('dashboard', compact('userStats', 'upcomingSessions', 'recentConversations'));
    }
}
