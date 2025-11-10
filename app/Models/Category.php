<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'icon',
        'color',
        'description',
        'is_active',
        'order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug from name_en if not provided
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name_en);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name_en') && empty($category->slug)) {
                $category->slug = Str::slug($category->name_en);
            }
        });
    }

    /**
     * Relationships
     */

    /**
     * Get all skills in this category
     * TODO: Uncomment when Skill model is created
     */
    public function skills()
    {
        // Temporarily return empty collection until Skill model is created
        return $this->hasMany(\App\Models\Skill::class);
    }

    /**
     * Scopes
     */

    /**
     * Scope to get only active categories
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by custom order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    /**
     * Accessors & Mutators
     */

    /**
     * Get name based on current locale (RTL support)
     */
    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'ar') {
            return $this->name_ar;
        }
        
        return $this->name_en;
    }

    /**
     * Get skills count for this category
     */
    public function getSkillsCountAttribute()
    {
        return $this->skills()->count();
    }

    /**
     * Get active skills count for this category
     */
    public function getActiveSkillsCountAttribute()
    {
        return $this->skills()->where('is_active', true)->count();
    }

    /**
     * Helper Methods
     */

    /**
     * Toggle category active status
     */
    public function toggleStatus()
    {
        $this->is_active = !$this->is_active;
        $this->save();
        
        return $this->is_active;
    }

    /**
     * Check if category has skills
     */
    public function hasSkills()
    {
        return $this->skills()->exists();
    }

    /**
     * Get Heroicon component name
     * Frontend will use this with @heroicon() or similar
     */
    public function getIconComponent()
    {
        return $this->icon ?? 'tag';
    }

    /**
     * Get color classes for Tailwind
     */
    public function getColorClasses()
    {
        $color = $this->color ?? 'blue';
        
        return [
            'bg' => "bg-{$color}-100 dark:bg-{$color}-900/30",
            'text' => "text-{$color}-600 dark:text-{$color}-400",
            'border' => "border-{$color}-500",
            'gradient' => "from-{$color}-500 to-{$color}-600",
        ];
    }
}
