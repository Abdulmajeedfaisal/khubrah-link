<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of user notifications
     */
    public function index()
    {
        $user = auth()->user();
        
        $notifications = $user->notifications()
            ->paginate(20);
        
        $unreadCount = $user->unreadNotifications()->count();

        return view('notifications.index', compact('notifications', 'unreadCount'));
    }

    /**
     * Mark notification as read
     */
    public function markAsRead($id)
    {
        $user = auth()->user();
        
        $notification = $user->notifications()->findOrFail($id);
        $notification->markAsRead();

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead()
    {
        $user = auth()->user();
        
        $user->unreadNotifications->markAsRead();

        return redirect()
            ->route('notifications.index')
            ->with('success', 'تم تعليم جميع الإشعارات كمقروءة');
    }

    /**
     * Get unread notifications count
     */
    public function getUnreadCount()
    {
        $user = auth()->user();
        
        $count = $user->unreadNotifications()->count();

        return response()->json([
            'count' => $count,
        ]);
    }

    /**
     * Delete notification
     */
    public function destroy($id)
    {
        $user = auth()->user();
        
        $notification = $user->notifications()->findOrFail($id);
        $notification->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
