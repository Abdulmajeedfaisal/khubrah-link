<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show(Request $request): View
    {
        $user = $request->user();
        
        // Load skills owned by user (as teacher)
        $user->load([
            'skills' => function ($query) {
                $query->where('is_active', true)
                      ->with('category')
                      ->latest();
            }
        ]);
        
        // Get statistics
        $teachingSkillsCount = $user->skills()->where('is_active', true)->count();
        $completedSessionsCount = $user->teachingSessions()->where('status', 'completed')->count() 
                                + $user->learningSessions()->where('status', 'completed')->count();
        
        // Get reviews received (as teacher)
        $reviews = \App\Models\Review::whereHas('session', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        })
        ->with(['reviewer', 'session.skill'])
        ->latest()
        ->limit(5)
        ->get();
        
        $reviewsCount = \App\Models\Review::whereHas('session', function ($query) use ($user) {
            $query->where('teacher_id', $user->id);
        })->count();
        
        return view('profile.show', [
            'user' => $user,
            'teachingSkillsCount' => $teachingSkillsCount,
            'completedSessionsCount' => $completedSessionsCount,
            'reviews' => $reviews,
            'reviewsCount' => $reviewsCount,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                \Storage::disk('public')->delete($user->avatar);
            }
            
            // Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
        
        // Handle avatar removal
        if ($request->input('remove_avatar') == '1') {
            if ($user->avatar) {
                \Storage::disk('public')->delete($user->avatar);
                $user->avatar = null;
            }
        }
        
        // Update other fields
        $user->fill($request->except(['avatar', 'remove_avatar']));

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
