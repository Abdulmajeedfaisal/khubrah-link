<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of sessions (monitoring)
     */
    public function index(Request $request)
    {
        $query = Session::with(['skill', 'teacher', 'learner']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->filled('from_date')) {
            $query->whereDate('scheduled_at', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->whereDate('scheduled_at', '<=', $request->to_date);
        }

        // Search
        if ($request->filled('search')) {
            $query->whereHas('skill', function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%");
            });
        }

        $sessions = $query->latest('scheduled_at')->paginate(20);

        // Statistics
        $stats = [
            'total' => Session::count(),
            'pending' => Session::where('status', 'pending')->count(),
            'confirmed' => Session::where('status', 'confirmed')->count(),
            'completed' => Session::where('status', 'completed')->count(),
            'cancelled' => Session::where('status', 'cancelled')->count(),
        ];

        return view('admin.sessions.index', compact('sessions', 'stats'));
    }

    /**
     * Display the specified session
     */
    public function show(Session $session)
    {
        $session->load(['skill', 'teacher', 'learner', 'cancelledBy', 'review']);

        return view('admin.sessions.show', compact('session'));
    }

    /**
     * Resolve dispute or issue
     */
    public function resolveDispute(Request $request, Session $session)
    {
        $request->validate([
            'resolution' => 'required|string|max:1000',
            'action' => 'required|in:refund,complete,cancel',
        ]);

        // Handle based on action
        switch ($request->action) {
            case 'refund':
                $session->payment_status = 'refunded';
                $session->status = 'cancelled';
                break;
            case 'complete':
                $session->complete();
                break;
            case 'cancel':
                $session->cancel($request->resolution, auth()->id());
                break;
        }

        $session->save();

        logActivity('resolved_dispute', $session, 'Admin resolved dispute: ' . $request->action);

        return redirect()
            ->back()
            ->with('success', 'تم حل المشكلة بنجاح');
    }
}
