<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Show the form for creating a new review.
     */
    public function create($sessionId)
    {
        // TODO: Fetch session details and verify user can review
        return view('reviews.create', compact('sessionId'));
    }

    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request)
    {
        // TODO: Validate and store review
        // $validated = $request->validate([
        //     'session_id' => 'required|exists:sessions,id',
        //     'rating' => 'required|integer|min:1|max:5',
        //     'communication_rating' => 'required|integer|min:1|max:5',
        //     'knowledge_rating' => 'required|integer|min:1|max:5',
        //     'patience_rating' => 'required|integer|min:1|max:5',
        //     'preparation_rating' => 'required|integer|min:1|max:5',
        //     'comment' => 'required|string|min:10',
        //     'would_recommend' => 'boolean',
        //     ]);

        return redirect()->route('sessions.show', $request->session_id)
            ->with('success', 'شكراً لك! تم إرسال تقييمك بنجاح');
    }

    /**
     * Display the specified review.
     */
    public function show($id)
    {
        // TODO: Fetch review details
        return view('reviews.show', compact('id'));
    }

    /**
     * Update the specified review in storage.
     */
    public function update(Request $request, $id)
    {
        // TODO: Update review
        return redirect()->route('reviews.show', $id)
            ->with('success', 'تم تحديث التقييم بنجاح!');
    }

    /**
     * Remove the specified review from storage.
     */
    public function destroy($id)
    {
        // TODO: Delete review
        return redirect()->route('profile.show')
            ->with('success', 'تم حذف التقييم بنجاح!');
    }
}
