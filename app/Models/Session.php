<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Session extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skill_sessions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'skill_id',
        'teacher_id',
        'learner_id',
        'scheduled_at',
        'duration',
        'session_type',
        'status',
        'meeting_link',
        'location',
        'notes',
        'price',
        'payment_status',
        'cancellation_reason',
        'cancelled_by',
        'cancelled_at',
        'completed_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'scheduled_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'completed_at' => 'datetime',
        'duration' => 'integer',
        'price' => 'decimal:2',
    ];

    /**
     * Relationships
     */

    /**
     * Get the skill for this session
     */
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    /**
     * Get the teacher (provider) for this session
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Get the learner for this session
     */
    public function learner()
    {
        return $this->belongsTo(User::class, 'learner_id');
    }

    /**
     * Get the user who cancelled this session
     */
    public function cancelledBy()
    {
        return $this->belongsTo(User::class, 'cancelled_by');
    }

    /**
     * Get the review for this session
     */
    public function review()
    {
        return $this->hasOne(Review::class);
    }

    /**
     * Scopes
     */

    /**
     * Scope to get upcoming sessions
     */
    public function scopeUpcoming($query)
    {
        return $query->where('scheduled_at', '>', now())
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('scheduled_at', 'asc');
    }

    /**
     * Scope to get completed sessions
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed')
            ->orderBy('completed_at', 'desc');
    }

    /**
     * Scope to get cancelled sessions
     */
    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled')
            ->orderBy('cancelled_at', 'desc');
    }

    /**
     * Scope to get pending sessions
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending')
            ->orderBy('scheduled_at', 'asc');
    }

    /**
     * Scope to get confirmed sessions
     */
    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed')
            ->orderBy('scheduled_at', 'asc');
    }

    /**
     * Scope to get sessions for a specific user (as teacher or learner)
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where(function ($q) use ($userId) {
            $q->where('teacher_id', $userId)
              ->orWhere('learner_id', $userId);
        });
    }

    /**
     * Scope to get sessions as teacher
     */
    public function scopeAsTeacher($query, $userId)
    {
        return $query->where('teacher_id', $userId);
    }

    /**
     * Scope to get sessions as learner
     */
    public function scopeAsLearner($query, $userId)
    {
        return $query->where('learner_id', $userId);
    }

    /**
     * Helper Methods
     */

    /**
     * Confirm the session
     */
    public function confirm()
    {
        $this->status = 'confirmed';
        $this->save();

        // TODO: Send notification to learner
        
        return $this;
    }

    /**
     * Complete the session
     */
    public function complete()
    {
        $this->status = 'completed';
        $this->completed_at = now();
        $this->save();

        // TODO: Send notification to both users
        
        return $this;
    }

    /**
     * Cancel the session
     */
    public function cancel($reason, $userId)
    {
        $this->status = 'cancelled';
        $this->cancellation_reason = $reason;
        $this->cancelled_by = $userId;
        $this->cancelled_at = now();
        $this->save();

        // TODO: Send notification to both users
        
        return $this;
    }

    /**
     * Reschedule the session
     */
    public function reschedule($newDateTime)
    {
        $this->scheduled_at = $newDateTime;
        $this->save();

        // TODO: Send notification to both users
        
        return $this;
    }

    /**
     * Check if session can be cancelled
     */
    public function canBeCancelled()
    {
        if (!in_array($this->status, ['pending', 'confirmed'])) {
            return false;
        }

        // Can cancel up to 24 hours before session
        $hoursUntilSession = now()->diffInHours($this->scheduled_at, false);
        
        return $hoursUntilSession >= 24;
    }

    /**
     * Check if session can be completed
     */
    public function canBeCompleted()
    {
        return $this->status === 'confirmed' && 
               $this->scheduled_at->isPast();
    }

    /**
     * Check if session can be reviewed
     */
    public function canBeReviewed()
    {
        return $this->status === 'completed' && 
               !$this->review()->exists();
    }

    /**
     * Check if user is teacher
     */
    public function isTeacher($userId)
    {
        return $this->teacher_id == $userId;
    }

    /**
     * Check if user is learner
     */
    public function isLearner($userId)
    {
        return $this->learner_id == $userId;
    }

    /**
     * Check if user is participant
     */
    public function isParticipant($userId)
    {
        return $this->isTeacher($userId) || $this->isLearner($userId);
    }

    /**
     * Accessors
     */

    /**
     * Get formatted scheduled date
     */
    public function getFormattedScheduledAtAttribute()
    {
        return formatDateArabic($this->scheduled_at);
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        return formatPrice($this->price);
    }

    /**
     * Get status in Arabic
     */
    public function getStatusArabicAttribute()
    {
        return getSessionStatus($this->status);
    }

    /**
     * Get status color
     */
    public function getStatusColorAttribute()
    {
        return getSessionStatusColor($this->status);
    }

    /**
     * Get time until session
     */
    public function getTimeUntilSessionAttribute()
    {
        if ($this->scheduled_at->isPast()) {
            return 'منتهية';
        }

        return timeAgo($this->scheduled_at);
    }

    /**
     * Check if session is today
     */
    public function getIsTodayAttribute()
    {
        return $this->scheduled_at->isToday();
    }

    /**
     * Check if session is past
     */
    public function getIsPastAttribute()
    {
        return $this->scheduled_at->isPast();
    }
}
