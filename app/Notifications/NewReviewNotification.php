<?php

namespace App\Notifications;

use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewReviewNotification extends Notification
{
    use Queueable;

    protected $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'تقييم جديد',
            'message' => 'تلقيت تقييماً جديداً من ' . $this->review->reviewer->name,
            'reviewer_name' => $this->review->reviewer->name,
            'rating' => $this->review->overall_rating,
            'comment' => \Str::limit($this->review->comment, 50),
            'action_url' => route('sessions.show', $this->review->session),
        ];
    }
}
