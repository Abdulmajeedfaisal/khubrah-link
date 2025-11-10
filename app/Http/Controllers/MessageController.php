<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of conversations
     */
    public function index()
    {
        $user = auth()->user();
        
        $conversations = Conversation::forUser($user->id)
            ->with(['user1', 'user2', 'lastMessage'])
            ->orderBy('last_message_at', 'desc')
            ->get();

        return view('messages.index', compact('conversations'));
    }

    /**
     * Display the specified conversation
     */
    public function show(User $user)
    {
        $currentUser = auth()->user();
        
        // Find or create conversation
        $conversation = Conversation::findOrCreateBetween($currentUser->id, $user->id);
        
        // Mark messages as read
        $conversation->markAsRead($currentUser->id);
        
        // Load messages
        $messages = $conversation->messages()
            ->with('sender')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('messages.show', compact('conversation', 'messages', 'user'));
    }

    /**
     * Store a newly created message
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ], [
            'receiver_id.required' => 'المستقبل مطلوب',
            'receiver_id.exists' => 'المستخدم غير موجود',
            'message.required' => 'الرسالة مطلوبة',
            'message.max' => 'الرسالة يجب ألا تتجاوز 1000 حرف',
        ]);

        $senderId = auth()->id();
        $receiverId = $request->receiver_id;

        // Find or create conversation
        $conversation = Conversation::findOrCreateBetween($senderId, $receiverId);

        // Create message
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $senderId,
            'message' => $request->message,
        ]);

        // Update conversation last message time
        $conversation->updateLastMessageAt();

        logActivity('created', $message, 'Sent message');

        // TODO: Broadcast message via WebSocket
        // TODO: Send notification to receiver

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
            ]);
        }

        return redirect()->back()->with('success', 'تم إرسال الرسالة');
    }

    /**
     * Mark conversation messages as read
     */
    public function markAsRead(Conversation $conversation)
    {
        // Check authorization
        if (!$conversation->isParticipant(auth()->id())) {
            abort(403, 'غير مصرح لك بالوصول لهذه المحادثة');
        }

        $conversation->markAsRead(auth()->id());

        return response()->json([
            'success' => true,
        ]);
    }
}
