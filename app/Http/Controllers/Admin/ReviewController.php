<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of reviews
     */
    public function index(Request $request)
    {
        $query = Review::with(['reviewer', 'reviewee', 'session.skill']);

        // Filter by approval status
        if ($request->filled('status')) {
            if ($request->status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($request->status === 'pending') {
                $query->where('is_approved', false);
            }
        }

        // Filter by rating
        if ($request->filled('rating')) {
            $query->byRating($request->rating);
        }

        // Search
        if ($request->filled('search')) {
            $query->whereHas('reviewee', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            });
        }

        $reviews = $query->latest()->paginate(20);

        // Statistics
        $stats = [
            'total' => Review::count(),
            'approved' => Review::where('is_approved', true)->count(),
            'pending' => Review::where('is_approved', false)->count(),
            'high_rated' => Review::highRated()->count(),
            'low_rated' => Review::lowRated()->count(),
        ];

        return view('admin.reviews.index', compact('reviews', 'stats'));
    }

    /**
     * Display the specified review
     */
    public function show(Review $review)
    {
        $review->load(['reviewer', 'reviewee', 'session.skill']);

        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Toggle review approval
     */
    public function toggleApproval(Review $review)
    {
        $newStatus = $review->toggleApproval();
        $statusText = $newStatus ? 'الموافقة على' : 'إلغاء الموافقة على';

        logActivity('toggled_approval', $review, "Admin toggled review approval to " . ($newStatus ? 'approved' : 'not approved'));

        return redirect()
            ->back()
            ->with('success', "تم {$statusText} التقييم بنجاح");
    }

    /**
     * Remove the specified review
     */
    public function destroy(Review $review)
    {
        $review->delete();

        logActivity('deleted', null, 'Admin deleted review');

        return redirect()
            ->route('admin.reviews.index')
            ->with('success', 'تم حذف التقييم بنجاح');
    }
}
