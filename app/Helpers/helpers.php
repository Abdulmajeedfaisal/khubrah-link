<?php

/**
 * Global Helper Functions for Khubrah-Link
 * 
 * These functions are available throughout the application
 */

if (!function_exists('formatDate')) {
    /**
     * Format date in Arabic/English based on locale
     */
    function formatDate($date, $format = 'Y-m-d H:i')
    {
        if (!$date) return '-';
        
        return \Carbon\Carbon::parse($date)->format($format);
    }
}

if (!function_exists('formatDateArabic')) {
    /**
     * Format date in Arabic style
     */
    function formatDateArabic($date)
    {
        if (!$date) return '-';
        
        return \Carbon\Carbon::parse($date)->locale('ar')->translatedFormat('j F Y');
    }
}

if (!function_exists('timeAgo')) {
    /**
     * Get human-readable time difference
     */
    function timeAgo($date)
    {
        if (!$date) return '-';
        
        return \Carbon\Carbon::parse($date)->diffForHumans();
    }
}

if (!function_exists('uploadImage')) {
    /**
     * Upload image and return path
     */
    function uploadImage($file, $directory = 'images', $disk = 'public')
    {
        if (!$file) return null;
        
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs($directory, $filename, $disk);
        
        return $path;
    }
}

if (!function_exists('deleteImage')) {
    /**
     * Delete image from storage
     */
    function deleteImage($path, $disk = 'public')
    {
        if (!$path) return false;
        
        return \Storage::disk($disk)->delete($path);
    }
}

if (!function_exists('getImageUrl')) {
    /**
     * Get full URL for image
     */
    function getImageUrl($path, $disk = 'public')
    {
        if (!$path) return asset('images/default-avatar.png');
        
        return \Storage::disk($disk)->url($path);
    }
}

if (!function_exists('sanitizeInput')) {
    /**
     * Sanitize user input
     */
    function sanitizeInput($input)
    {
        return htmlspecialchars(strip_tags($input), ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('generateSlug')) {
    /**
     * Generate URL-friendly slug
     */
    function generateSlug($text)
    {
        return \Illuminate\Support\Str::slug($text);
    }
}

if (!function_exists('formatPrice')) {
    /**
     * Format price with currency
     */
    function formatPrice($price, $currency = 'ر.س')
    {
        return number_format($price, 2) . ' ' . $currency;
    }
}

if (!function_exists('calculateRating')) {
    /**
     * Calculate average rating
     */
    function calculateRating($reviews)
    {
        if ($reviews->isEmpty()) return 0;
        
        return round($reviews->avg('overall_rating'), 1);
    }
}

if (!function_exists('getSessionStatus')) {
    /**
     * Get session status in Arabic
     */
    function getSessionStatus($status)
    {
        $statuses = [
            'pending' => 'قيد الانتظار',
            'confirmed' => 'مؤكدة',
            'completed' => 'مكتملة',
            'cancelled' => 'ملغاة',
        ];
        
        return $statuses[$status] ?? $status;
    }
}

if (!function_exists('getSessionStatusColor')) {
    /**
     * Get session status color class
     */
    function getSessionStatusColor($status)
    {
        $colors = [
            'pending' => 'yellow',
            'confirmed' => 'blue',
            'completed' => 'green',
            'cancelled' => 'red',
        ];
        
        return $colors[$status] ?? 'gray';
    }
}

if (!function_exists('canCancelSession')) {
    /**
     * Check if session can be cancelled
     */
    function canCancelSession($session)
    {
        if ($session->status !== 'pending' && $session->status !== 'confirmed') {
            return false;
        }
        
        // Can cancel up to 24 hours before session
        $hoursUntilSession = \Carbon\Carbon::now()->diffInHours($session->scheduled_at, false);
        
        return $hoursUntilSession >= 24;
    }
}

if (!function_exists('getSkillLevel')) {
    /**
     * Get skill level in Arabic
     */
    function getSkillLevel($level)
    {
        $levels = [
            'beginner' => 'مبتدئ',
            'intermediate' => 'متوسط',
            'advanced' => 'متقدم',
            'expert' => 'خبير',
        ];
        
        return $levels[$level] ?? $level;
    }
}

if (!function_exists('getSessionType')) {
    /**
     * Get session type in Arabic
     */
    function getSessionType($type)
    {
        $types = [
            'online' => 'عن بُعد',
            'in-person' => 'حضوري',
            'both' => 'كلاهما',
        ];
        
        return $types[$type] ?? $type;
    }
}

if (!function_exists('isAdmin')) {
    /**
     * Check if current user is admin
     */
    function isAdmin()
    {
        return auth()->check() && auth()->user()->is_admin;
    }
}

if (!function_exists('currentUser')) {
    /**
     * Get current authenticated user
     */
    function currentUser()
    {
        return auth()->user();
    }
}

if (!function_exists('logActivity')) {
    /**
     * Log user activity
     */
    function logActivity($action, $model = null, $description = null)
    {
        \Log::info('User Activity', [
            'user_id' => auth()->id(),
            'action' => $action,
            'model' => $model ? get_class($model) : null,
            'model_id' => $model?->id,
            'description' => $description,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}

if (!function_exists('sendNotification')) {
    /**
     * Send notification to user
     */
    function sendNotification($user, $notification)
    {
        try {
            $user->notify($notification);
            return true;
        } catch (\Exception $e) {
            \Log::error('Notification Error: ' . $e->getMessage());
            return false;
        }
    }
}

if (!function_exists('truncateText')) {
    /**
     * Truncate text to specified length
     */
    function truncateText($text, $length = 100, $suffix = '...')
    {
        if (mb_strlen($text) <= $length) {
            return $text;
        }
        
        return mb_substr($text, 0, $length) . $suffix;
    }
}

if (!function_exists('getDefaultAvatar')) {
    /**
     * Get default avatar URL
     */
    function getDefaultAvatar($name = null)
    {
        if ($name) {
            // Generate avatar with first letter
            return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=random&color=fff&size=200';
        }
        
        return asset('images/default-avatar.png');
    }
}
