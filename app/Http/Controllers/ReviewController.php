<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Session;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Show the form for creating a new review
     */
    public function create(Session $session)
    {
        // Check authorization
        if (!$session->isParticipant(auth()->id())) {
            abort(403, 'غير مصرح لك بتقييم هذه الجلسة');
        }

        // Check if session can be reviewed
        if (!$session->canBeReviewed()) {
            return redirect()
                ->back()
                ->with('error', 'لا يمكن تقييم هذه الجلسة');
        }

        // Check if already reviewed
        if ($session->review()->exists()) {
            return redirect()
                ->back()
                ->with('error', 'تم تقييم هذه الجلسة مسبقاً');
        }

        $session->load(['skill', 'teacher', 'learner']);

        return view('reviews.create', compact('session'));
    }

    /**
     * Store a newly created review
     */
    public function store(ReviewRequest $request, Session $session)
    {
        // Check authorization
        if (!$session->isParticipant(auth()->id())) {
            abort(403, 'غير مصرح لك بتقييم هذه الجلسة');
        }

        // Check if session can be reviewed
        if (!$session->canBeReviewed()) {
            return redirect()
                ->back()
                ->with('error', 'لا يمكن تقييم هذه الجلسة');
        }

        // Check if already reviewed
        if ($session->review()->exists()) {
            return redirect()
                ->back()
                ->with('error', 'تم تقييم هذه الجلسة مسبقاً');
        }

        // Determine who is being reviewed
        $revieweeId = $session->isTeacher(auth()->id()) 
            ? $session->learner_id 
            : $session->teacher_id;

        $review = Review::create([
            'session_id' => $session->id,
            'reviewer_id' => auth()->id(),
            'reviewee_id' => $revieweeId,
            'overall_rating' => $request->overall_rating,
            'communication_rating' => $request->communication_rating,
            'knowledge_rating' => $request->knowledge_rating,
            'punctuality_rating' => $request->punctuality_rating,
            'professionalism_rating' => $request->professionalism_rating,
            'comment' => $request->comment,
        ]);

        logActivity('created', $review, 'Created review for session: ' . $session->id);

        // TODO: Send notification to reviewee

        return redirect()
            ->route('sessions.show', $session)
            ->with('success', 'شكراً لك! تم إرسال تقييمك بنجاح');
    }

    /**
     * Update the specified review
     */
    public function update(ReviewRequest $request, Review $review)
    {
        // Check authorization
        if ($review->reviewer_id !== auth()->id()) {
            abort(403, 'غير مصرح لك بتعديل هذا التقييم');
        }

        $review->update($request->validated());

        logActivity('updated', $review, 'Updated review');

        return redirect()
            ->back()
            ->with('success', 'تم تحديث التقييم بنجاح');
    }

    /**
     * Remove the specified review
     */
    public function destroy(Review $review)
    {
        // Check authorization
        if ($review->reviewer_id !== auth()->id()) {
            abort(403, 'غير مصرح لك بحذف هذا التقييم');
        }

        $review->delete();

        logActivity('deleted', null, 'Deleted review');

        return redirect()
            ->back()
            ->with('success', 'تم حذف التقييم بنجاح');
    }
}
