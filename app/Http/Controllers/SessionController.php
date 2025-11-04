<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of user sessions.
     */
    public function index()
    {
        // TODO: Fetch user sessions from database
        return view('sessions.index');
    }

    /**
     * Show the form for booking a new session.
     */
    public function create($userId)
    {
        // TODO: Fetch teacher info and available skills
        return view('sessions.book', compact('userId'));
    }

    /**
     * Store a newly created session in storage.
     */
    public function store(Request $request)
    {
        // TODO: Validate and store session booking
        // $validated = $request->validate([
        //     'skill_id' => 'required|exists:skills,id',
        //     'date' => 'required|date',
        //     'start_time' => 'required',
        //     'duration' => 'required|integer',
        //     'type' => 'required|in:online,in_person',
        //     'notes' => 'nullable|string',
        // ]);

        return redirect()->route('sessions.index')
            ->with('success', 'تم حجز الجلسة بنجاح!');
    }

    /**
     * Display the specified session.
     */
    public function show($id)
    {
        // TODO: Fetch session details from database
        return view('sessions.show', compact('id'));
    }

    /**
     * Update the specified session in storage.
     */
    public function update(Request $request, $id)
    {
        // TODO: Update session (reschedule, cancel, etc.)
        return redirect()->route('sessions.show', $id)
            ->with('success', 'تم تحديث الجلسة بنجاح!');
    }

    /**
     * Remove the specified session from storage.
     */
    public function destroy($id)
    {
        // TODO: Cancel/delete session
        return redirect()->route('sessions.index')
            ->with('success', 'تم إلغاء الجلسة بنجاح!');
    }
}
