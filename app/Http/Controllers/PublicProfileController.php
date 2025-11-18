<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\Review;
use App\Models\Session;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    /**
     * Display the specified user's public profile
     */
    public function show($id)
    {
        $user = \App\Models\User::findOrFail($id);
        
        // Load user's skills
        $skills = \App\Models\Skill::where('user_id', $user->id)
            ->active()
            ->with('category')
            ->get();
        
        // Load user's reviews (from sessions they taught)
        $reviews = \App\Models\Review::whereHas('session', function($q) use ($user) {
                $q->where('teacher_id', $user->id);
            })
            ->with(['reviewer', 'session.skill'])
            ->latest()
            ->paginate(10);
        
        // Calculate stats
        $stats = [
            'average_rating' => \App\Models\Review::whereHas('session', function($q) use ($user) {
                    $q->where('teacher_id', $user->id);
                })
                ->avg('overall_rating') ?? 0,
            'total_sessions' => \App\Models\Session::where('teacher_id', $user->id)
                ->where('status', 'completed')
                ->count(),
            'total_skills' => $skills->count(),
            'total_reviews' => $reviews->total(),
        ];
        
        return view('pages.public-profile', compact('user', 'skills', 'reviews', 'stats'));
    }

}
