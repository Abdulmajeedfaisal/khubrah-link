<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reporter_id',
        'reported_user_id',
        'reported_content_type',
        'reported_content_id',
        'reason',
        'description',
        'evidence',
        'status',
        'admin_notes',
        'resolved_by',
        'resolved_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'evidence' => 'array',
        'resolved_at' => 'datetime',
    ];

    /**
     * Relationships
     */

    /**
     * Get the user who submitted the report
     */
    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    /**
     * Get the reported user
     */
    public function reportedUser()
    {
        return $this->belongsTo(User::class, 'reported_user_id');
    }

    /**
     * Get the admin who resolved the report
     */
    public function resolver()
    {
        return $this->belongsTo(User::class, 'resolved_by');
    }

    /**
     * Get the reported content (polymorphic)
     */
    public function reportable()
    {
        return $this->morphTo('reported_content', 'reported_content_type', 'reported_content_id');
    }

    /**
     * Scopes
     */

    /**
     * Scope to get pending reports
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope to get reviewing reports
     */
    public function scopeReviewing($query)
    {
        return $query->where('status', 'reviewing');
    }

    /**
     * Scope to get resolved reports
     */
    public function scopeResolved($query)
    {
        return $query->where('status', 'resolved');
    }

    /**
     * Scope to get rejected reports
     */
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    /**
     * Scope to filter by reporter
     */
    public function scopeByReporter($query, $userId)
    {
        return $query->where('reporter_id', $userId);
    }

    /**
     * Scope to filter by reported user
     */
    public function scopeByReportedUser($query, $userId)
    {
        return $query->where('reported_user_id', $userId);
    }

    /**
     * Helper Methods
     */

    /**
     * Mark report as reviewing
     */
    public function markAsReviewing()
    {
        $this->status = 'reviewing';
        $this->save();
        
        return $this;
    }

    /**
     * Resolve the report
     */
    public function resolve($adminNotes, $adminId)
    {
        $this->status = 'resolved';
        $this->admin_notes = $adminNotes;
        $this->resolved_by = $adminId;
        $this->resolved_at = now();
        $this->save();
        
        return $this;
    }

    /**
     * Reject the report
     */
    public function reject($adminNotes, $adminId)
    {
        $this->status = 'rejected';
        $this->admin_notes = $adminNotes;
        $this->resolved_by = $adminId;
        $this->resolved_at = now();
        $this->save();
        
        return $this;
    }

    /**
     * Accessors
     */

    /**
     * Get status in Arabic
     */
    public function getStatusArabicAttribute()
    {
        $statuses = [
            'pending' => 'قيد الانتظار',
            'reviewing' => 'قيد المراجعة',
            'resolved' => 'تم الحل',
            'rejected' => 'مرفوض',
        ];
        
        return $statuses[$this->status] ?? $this->status;
    }

    /**
     * Get status color
     */
    public function getStatusColorAttribute()
    {
        $colors = [
            'pending' => 'yellow',
            'reviewing' => 'blue',
            'resolved' => 'green',
            'rejected' => 'red',
        ];
        
        return $colors[$this->status] ?? 'gray';
    }

    /**
     * Get formatted date
     */
    public function getFormattedDateAttribute()
    {
        return formatDateArabic($this->created_at);
    }

    /**
     * Get time ago
     */
    public function getTimeAgoAttribute()
    {
        return timeAgo($this->created_at);
    }

    /**
     * Check if report is pending
     */
    public function getIsPendingAttribute()
    {
        return $this->status === 'pending';
    }

    /**
     * Check if report is resolved
     */
    public function getIsResolvedAttribute()
    {
        return $this->status === 'resolved';
    }
}
