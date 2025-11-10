<?php

namespace App\Notifications;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewMessageNotification extends Notification
{
    use Queueable;

    protected $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'رسالة جديدة',
            'message' => 'لديك رسالة جديدة من ' . $this->message->sender->name,
            'sender_name' => $this->message->sender->name,
            'message_preview' => \Str::limit($this->message->message, 50),
            'action_url' => route('messages.show', $this->message->sender),
        ];
    }
}
