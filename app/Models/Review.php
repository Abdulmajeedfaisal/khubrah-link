<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'session_id',
        'reviewer_id',
        'reviewee_id',
        'overall_rating',
        'communication_rating',
        'knowledge_rating',
        'punctuality_rating',
        'professionalism_rating',
        'comment',
        'is_approved',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'overall_rating' => 'integer',
        'communication_rating' => 'integer',
        'knowledge_rating' => 'integer',
        'punctuality_rating' => 'integer',
        'professionalism_rating' => 'integer',
        'is_approved' => 'boolean',
    ];

    /**
     * Relationships
     */

    /**
     * Get the session for this review
     */
    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id', 'id');
    }

    /**
     * Get the user who wrote the review
     */
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    /**
     * Get the user being reviewed
     */
    public function reviewee()
    {
        return $this->belongsTo(User::class, 'reviewee_id');
    }

    /**
     * Scopes
     */

    /**
     * Scope to get only approved reviews
     */
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    /**
     * Scope to get reviews for a specific user
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('reviewee_id', $userId);
    }

    /**
     * Scope to get reviews by a specific user
     */
    public function scopeByUser($query, $userId)
    {
        return $query->where('reviewer_id', $userId);
    }

    /**
     * Scope to filter by rating
     */
    public function scopeByRating($query, $rating)
    {
        return $query->where('overall_rating', $rating);
    }

    /**
     * Scope to get high-rated reviews (4-5 stars)
     */
    public function scopeHighRated($query)
    {
        return $query->where('overall_rating', '>=', 4);
    }

    /**
     * Scope to get low-rated reviews (1-2 stars)
     */
    public function scopeLowRated($query)
    {
        return $query->where('overall_rating', '<=', 2);
    }

    /**
     * Helper Methods
     */

    /**
     * Toggle approval status
     */
    public function toggleApproval()
    {
        $this->is_approved = !$this->is_approved;
        $this->save();
        
        return $this->is_approved;
    }

    /**
     * Calculate average of all ratings
     */
    public function getAverageRating()
    {
        $ratings = array_filter([
            $this->overall_rating,
            $this->communication_rating,
            $this->knowledge_rating,
            $this->punctuality_rating,
            $this->professionalism_rating,
        ]);

        return count($ratings) > 0 ? round(array_sum($ratings) / count($ratings), 1) : 0;
    }

    /**
     * Accessors
     */

    /**
     * Get rating as stars (for display)
     */
    public function getStarsAttribute()
    {
        return str_repeat('⭐', $this->overall_rating);
    }

    /**
     * Get rating color class
     */
    public function getRatingColorAttribute()
    {
        if ($this->overall_rating >= 4) {
            return 'green';
        } elseif ($this->overall_rating >= 3) {
            return 'yellow';
        } else {
            return 'red';
        }
    }

    /**
     * Check if review is positive (4-5 stars)
     */
    public function getIsPositiveAttribute()
    {
        return $this->overall_rating >= 4;
    }

    /**
     * Check if review is negative (1-2 stars)
     */
    public function getIsNegativeAttribute()
    {
        return $this->overall_rating <= 2;
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
}
