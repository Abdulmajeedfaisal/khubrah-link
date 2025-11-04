<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of skills (Browse Skills Page)
     */
    public function index(Request $request)
    {
        // TODO: Backend Developer - Replace with actual database queries
        
        // Get dummy data
        $skills = $this->getDummySkills();
        
        // Apply Search Filter
        if ($request->has('search') && $request->search) {
            $searchTerm = strtolower($request->search);
            $skills = $skills->filter(function($skill) use ($searchTerm) {
                return str_contains(strtolower($skill['skill_name']), $searchTerm) ||
                       str_contains(strtolower($skill['description']), $searchTerm);
            });
        }
        
        // Apply Category Filter
        if ($request->has('category') && $request->category) {
            $skills = $skills->filter(function($skill) use ($request) {
                return strtolower($skill['category']) === strtolower($request->category);
            });
        }
        
        // Apply Location Filter
        if ($request->has('location') && $request->location) {
            $skills = $skills->filter(function($skill) use ($request) {
                return str_contains(strtolower($skill['location']), strtolower($request->location));
            });
        }
        
        // Apply Mode Filter
        if ($request->has('mode') && $request->mode) {
            $skills = $skills->filter(function($skill) use ($request) {
                return str_contains(strtolower($skill['mode']), strtolower($request->mode));
            });
        }
        
        // TODO: Implement pagination (12 per page) when using real database
        // $skills = UserSkill::with(['user', 'skill'])
        //     ->where('skill_type', 'teach')
        //     ->when($request->category, fn($q, $cat) => 
        //         $q->whereHas('skill', fn($q) => $q->where('category', $cat))
        //     )
        //     ->when($request->location, fn($q, $loc) => 
        //         $q->whereHas('user', fn($q) => $q->where('location', $loc))
        //     )
        //     ->when($request->mode, fn($q, $mode) => 
        //         $q->where('preferred_mode', $mode)
        //     )
        //     ->when($request->search, fn($q, $search) => 
        //         $q->whereHas('skill', fn($q) => 
        //             $q->where('skill_name', 'like', "%{$search}%")
        //         )
        //     )
        //     ->paginate(12);
        
        return view('pages.browse', compact('skills'));
    }
    
    /**
     * Dummy data for development
     * TODO: Backend Developer - Remove this method after implementing database
     */
    private function getDummySkills()
    {
        return collect([
            [
                'id' => 1,
                'provider' => [
                    'name' => 'أحمد محمد',
                    'avatar' => 'أ',
                    'rating' => 4.9,
                    'reviews_count' => 24,
                ],
                'skill_name' => 'تطوير تطبيقات الويب بـ Laravel',
                'description' => 'تعلم بناء تطبيقات ويب احترافية باستخدام Laravel مع أفضل الممارسات',
                'category' => 'التقنية',
                'level' => 'متقدم',
                'location' => 'الرياض',
                'mode' => 'حضوري / عن بُعد',
            ],
            [
                'id' => 2,
                'provider' => [
                    'name' => 'سارة أحمد',
                    'avatar' => 'س',
                    'rating' => 5.0,
                    'reviews_count' => 18,
                ],
                'skill_name' => 'تصميم واجهات المستخدم UI/UX',
                'description' => 'تعلم أساسيات ومبادئ تصميم واجهات المستخدم باستخدام Figma',
                'category' => 'التصميم',
                'level' => 'مبتدئ',
                'location' => 'جدة',
                'mode' => 'عن بُعد فقط',
            ],
            [
                'id' => 3,
                'provider' => [
                    'name' => 'محمد علي',
                    'avatar' => 'م',
                    'rating' => 4.7,
                    'reviews_count' => 32,
                ],
                'skill_name' => 'تعلم اللغة الإنجليزية - محادثة',
                'description' => 'حسّن مهاراتك في المحادثة باللغة الإنجليزية',
                'category' => 'اللغات',
                'level' => 'متوسط',
                'location' => 'الدمام',
                'mode' => 'حضوري / عن بُعد',
            ],
        ]);
    }
}
