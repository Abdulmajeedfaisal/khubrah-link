<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Skill;
use App\Models\User;
use App\Http\Requests\SessionRequest;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of user sessions
     */
    public function index()
    {
        $user = auth()->user();
        
        $upcomingSessions = Session::with(['skill', 'teacher', 'learner'])
            ->forUser($user->id)
            ->upcoming()
            ->get();
        
        $completedSessions = Session::with(['skill', 'teacher', 'learner'])
            ->forUser($user->id)
            ->completed()
            ->limit(10)
            ->get();

        return view('sessions.index', compact('upcomingSessions', 'completedSessions'));
    }

    /**
     * Show the form for booking a new session
     */
    public function create(User $user)
    {
        $teacher = $user;
        $skills = Skill::where('user_id', $teacher->id)
            ->active()
            ->with('category')
            ->get();

        return view('sessions.book', compact('teacher', 'skills'));
    }

    /**
     * Store a newly created session
     */
    public function store(SessionRequest $request)
    {
        $skill = Skill::findOrFail($request->skill_id);
        
        // Check if user is trying to book their own skill
        if ($skill->user_id === auth()->id()) {
            return redirect()
                ->back()
                ->with('error', 'لا يمكنك حجز جلسة مع نفسك');
        }

        $session = Session::create([
            'skill_id' => $request->skill_id,
            'teacher_id' => $request->teacher_id,
            'learner_id' => auth()->id(),
            'scheduled_at' => $request->scheduled_at,
            'duration' => $request->duration,
            'session_type' => $request->session_type,
            'meeting_link' => $request->meeting_link,
            'location' => $request->location,
            'notes' => $request->notes,
            'price' => $skill->price_per_hour * ($request->duration / 60),
            'status' => 'pending',
        ]);

        logActivity('created', $session, 'Booked session: ' . $skill->title);

        // TODO: Send notification to teacher

        return redirect()
            ->route('sessions.show', $session)
            ->with('success', 'تم حجز الجلسة بنجاح! في انتظار تأكيد مقدم الخدمة');
    }

    /**
     * Display the specified session
     */
    public function show(Session $session)
    {
        // Check authorization
        if (!$session->isParticipant(auth()->id())) {
            abort(403, 'غير مصرح لك بعرض هذه الجلسة');
        }

        $session->load(['skill', 'teacher', 'learner', 'review']);

        return view('sessions.show', compact('session'));
    }

    /**
     * Confirm the session (teacher only)
     */
    public function confirm(Session $session)
    {
        // Check authorization
        if (!$session->isTeacher(auth()->id())) {
            abort(403, 'فقط مقدم الخدمة يمكنه تأكيد الجلسة');
        }

        if ($session->status !== 'pending') {
            return redirect()
                ->back()
                ->with('error', 'لا يمكن تأكيد هذه الجلسة');
        }

        $session->confirm();

        logActivity('confirmed', $session, 'Confirmed session');

        return redirect()
            ->back()
            ->with('success', 'تم تأكيد الجلسة بنجاح');
    }

    /**
     * Complete the session (teacher only)
     */
    public function complete(Session $session)
    {
        // Check authorization
        if (!$session->isTeacher(auth()->id())) {
            abort(403, 'فقط مقدم الخدمة يمكنه إكمال الجلسة');
        }

        if (!$session->canBeCompleted()) {
            return redirect()
                ->back()
                ->with('error', 'لا يمكن إكمال هذه الجلسة');
        }

        $session->complete();

        logActivity('completed', $session, 'Completed session');

        return redirect()
            ->back()
            ->with('success', 'تم إكمال الجلسة بنجاح');
    }

    /**
     * Cancel the session
     */
    public function cancel(Request $request, Session $session)
    {
        // Check authorization
        if (!$session->isParticipant(auth()->id())) {
            abort(403, 'غير مصرح لك بإلغاء هذه الجلسة');
        }

        if (!$session->canBeCancelled()) {
            return redirect()
                ->back()
                ->with('error', 'لا يمكن إلغاء الجلسة (يجب الإلغاء قبل 24 ساعة على الأقل)');
        }

        $request->validate([
            'cancellation_reason' => 'required|string|max:500',
        ], [
            'cancellation_reason.required' => 'سبب الإلغاء مطلوب',
            'cancellation_reason.max' => 'سبب الإلغاء يجب ألا يتجاوز 500 حرف',
        ]);

        $session->cancel($request->cancellation_reason, auth()->id());

        logActivity('cancelled', $session, 'Cancelled session');

        return redirect()
            ->route('sessions.index')
            ->with('success', 'تم إلغاء الجلسة بنجاح');
    }

    /**
     * Reschedule the session
     */
    public function reschedule(Request $request, Session $session)
    {
        // Check authorization
        if (!$session->isParticipant(auth()->id())) {
            abort(403, 'غير مصرح لك بإعادة جدولة هذه الجلسة');
        }

        if (!in_array($session->status, ['pending', 'confirmed'])) {
            return redirect()
                ->back()
                ->with('error', 'لا يمكن إعادة جدولة هذه الجلسة');
        }

        $request->validate([
            'scheduled_at' => 'required|date|after:now',
        ], [
            'scheduled_at.required' => 'الموعد الجديد مطلوب',
            'scheduled_at.date' => 'الموعد غير صحيح',
            'scheduled_at.after' => 'يجب أن يكون الموعد في المستقبل',
        ]);

        $session->reschedule($request->scheduled_at);

        logActivity('rescheduled', $session, 'Rescheduled session');

        return redirect()
            ->back()
            ->with('success', 'تم إعادة جدولة الجلسة بنجاح');
    }
}
