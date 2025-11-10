<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'level',
        'price_per_hour',
        'session_duration',
        'location',
        'session_type',
        'is_active',
        'views_count',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price_per_hour' => 'decimal:2',
        'session_duration' => 'integer',
        'is_active' => 'boolean',
        'views_count' => 'integer',
    ];

    /**
     * Relationships
     */

    /**
     * Get the user who owns this skill
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category of this skill
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all sessions for this skill
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    /**
     * Get all reviews for this skill (through sessions)
     */
    public function reviews()
    {
        return $this->hasManyThrough(Review::class, Session::class);
    }

    /**
     * Users who have this skill (many-to-many)
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skills')
            ->withPivot('type', 'proficiency_level', 'years_experience')
            ->withTimestamps();
    }

    /**
     * Scopes
     */

    /**
     * Scope to get only active skills
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to filter by category
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Scope to search skills
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->where(function ($q) use ($keyword) {
            $q->where('title', 'like', "%{$keyword}%")
              ->orWhere('description', 'like', "%{$keyword}%");
        });
    }

    /**
     * Scope to filter by location
     */
    public function scopeByLocation($query, $location)
    {
        return $query->where('location', 'like', "%{$location}%");
    }

    /**
     * Scope to filter by session type
     */
    public function scopeBySessionType($query, $type)
    {
        return $query->where(function ($q) use ($type) {
            $q->where('session_type', $type)
              ->orWhere('session_type', 'both');
        });
    }

    /**
     * Scope to filter by level
     */
    public function scopeByLevel($query, $level)
    {
        return $query->where('level', $level);
    }

    /**
     * Scope to filter by price range
     */
    public function scopeByPriceRange($query, $min, $max)
    {
        return $query->whereBetween('price_per_hour', [$min, $max]);
    }

    /**
     * Accessors & Mutators
     */

    /**
     * Get average rating for this skill
     */
    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('overall_rating') ?? 0;
    }

    /**
     * Get total sessions count
     */
    public function getTotalSessionsAttribute()
    {
        return $this->sessions()->count();
    }

    /**
     * Get completed sessions count
     */
    public function getCompletedSessionsAttribute()
    {
        return $this->sessions()->where('status', 'completed')->count();
    }

    /**
     * Helper Methods
     */

    /**
     * Toggle skill active status
     */
    public function toggleStatus()
    {
        $this->is_active = !$this->is_active;
        $this->save();
        
        return $this->is_active;
    }

    /**
     * Increment views count
     */
    public function incrementViews()
    {
        $this->increment('views_count');
    }

    /**
     * Check if skill has sessions
     */
    public function hasSessions()
    {
        return $this->sessions()->exists();
    }

    /**
     * Get formatted price
     */
    public function getFormattedPriceAttribute()
    {
        if (!$this->price_per_hour) {
            return 'مجاناً';
        }
        
        return formatPrice($this->price_per_hour);
    }

    /**
     * Get level in Arabic
     */
    public function getLevelArabicAttribute()
    {
        return getSkillLevel($this->level);
    }

    /**
     * Get session type in Arabic
     */
    public function getSessionTypeArabicAttribute()
    {
        return getSessionType($this->session_type);
    }
}
