<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of conversations.
     */
    public function index()
    {
        // TODO: Fetch user conversations from database
        return view('messages.index');
    }

    /**
     * Store a newly created message in storage.
     */
    public function store(Request $request)
    {
        // TODO: Validate and store message
        // $validated = $request->validate([
        //     'receiver_id' => 'required|exists:users,id',
        //     'message' => 'required|string|max:1000',
        // ]);

        // TODO: Broadcast message via WebSocket
        
        return response()->json([
            'success' => true,
            'message' => 'تم إرسال الرسالة'
        ]);
    }

    /**
     * Display the specified conversation.
     */
    public function show($userId)
    {
        // TODO: Fetch conversation with specific user
        return view('messages.show', compact('userId'));
    }

    /**
     * Mark messages as read.
     */
    public function markAsRead($conversationId)
    {
        // TODO: Mark all messages in conversation as read
        return response()->json([
            'success' => true
        ]);
    }
}
