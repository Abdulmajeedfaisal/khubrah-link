<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    /**
     * Display the specified user's public profile
     */
    public function show($username)
    {
        // TODO: Backend Developer - Replace with actual database query
        
        // Dummy data for now
        $user = $this->getDummyUser($username);
        
        // TODO: Implement actual database query
        // $user = User::where('username', $username)
        //     ->with([
        //         'teachingSkills.skill',
        //         'reviews' => fn($q) => $q->where('is_visible', true)->latest()->limit(10),
        //         'completedSessions' => fn($q) => $q->where('status', 'completed')
        //     ])
        //     ->firstOrFail();
        //
        // Calculate stats:
        // - Average rating
        // - Total completed sessions
        // - Total skills
        
        return view('pages.public-profile', compact('user'));
    }
    
    /**
     * Dummy data for development
     * TODO: Backend Developer - Remove this method after implementing database
     */
    private function getDummyUser($username)
    {
        return (object) [
            'id' => 1,
            'username' => $username,
            'name' => 'أحمد محمد',
            'avatar' => 'أ',
            'title' => 'مطور ويب محترف | خبير Laravel',
            'bio' => 'مطور ويب محترف مع أكثر من 5 سنوات من الخبرة في تطوير تطبيقات الويب باستخدام Laravel و Vue.js.',
            'location' => 'الرياض، السعودية',
            'joined_date' => 'يناير 2024',
            'rating' => 4.9,
            'completed_sessions' => 48,
            'total_skills' => 12,
            'reviews_count' => 24,
            'skills' => [
                [
                    'id' => 1,
                    'name' => 'تطوير تطبيقات الويب بـ Laravel',
                    'description' => 'تعلم بناء تطبيقات ويب احترافية من الصفر',
                    'category' => 'التقنية',
                    'level' => 'متقدم',
                    'mode' => 'حضوري / عن بُعد',
                ],
                [
                    'id' => 2,
                    'name' => 'Vue.js للمبتدئين',
                    'description' => 'أساسيات Vue.js وبناء تطبيقات تفاعلية',
                    'category' => 'التقنية',
                    'level' => 'مبتدئ',
                    'mode' => 'عن بُعد فقط',
                ],
                [
                    'id' => 3,
                    'name' => 'Git & GitHub للمطورين',
                    'description' => 'إتقان استخدام Git للتحكم بالإصدارات',
                    'category' => 'التقنية',
                    'level' => 'متوسط',
                    'mode' => 'حضوري / عن بُعد',
                ],
            ],
            'reviews' => [
                [
                    'id' => 1,
                    'reviewer' => [
                        'name' => 'سارة أحمد',
                        'avatar' => 'س',
                    ],
                    'rating' => 5,
                    'comment' => 'معلم ممتاز! شرحه واضح ومبسط، واستفدت كثيراً من جلسة Laravel. أنصح بشدة بالتعلم معه. شكراً أحمد! 🙏',
                    'skill_name' => 'تطوير تطبيقات الويب بـ Laravel',
                    'created_at' => 'منذ أسبوعين',
                ],
                [
                    'id' => 2,
                    'reviewer' => [
                        'name' => 'محمد علي',
                        'avatar' => 'م',
                    ],
                    'rating' => 4,
                    'comment' => 'جلسة مفيدة جداً، تعلمت الكثير عن Git. أسلوب الشرح ممتاز والأمثلة عملية.',
                    'skill_name' => 'Git & GitHub للمطورين',
                    'created_at' => 'منذ شهر',
                ],
            ],
        ];
    }
}
