<?php

namespace App\Notifications;

use App\Models\Session;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SessionConfirmedNotification extends Notification
{
    use Queueable;

    protected $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'تأكيد الجلسة',
            'message' => 'تم تأكيد جلستك',
            'session_id' => $this->session->id,
            'skill_title' => $this->session->skill->title,
            'scheduled_at' => $this->session->scheduled_at->format('Y-m-d H:i'),
            'action_url' => route('sessions.show', $this->session),
        ];
    }
}
