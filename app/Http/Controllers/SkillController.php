<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Category;
use App\Http\Requests\SkillRequest;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of skills (Browse Skills Page)
     */
    public function index(Request $request)
    {
        $query = Skill::with(['user', 'category'])
            ->active();
        
        // Apply Search Filter
        if ($request->filled('search')) {
            $query->search($request->search);
        }
        
        // Apply Category Filter
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }
        
        // Apply Location Filter
        if ($request->filled('location')) {
            $query->byLocation($request->location);
        }
        
        // Apply Session Type Filter
        if ($request->filled('mode')) {
            $sessionType = $request->mode === 'عن بُعد' ? 'online' : 
                          ($request->mode === 'حضوري' ? 'in-person' : null);
            if ($sessionType) {
                $query->bySessionType($sessionType);
            }
        }
        
        // Apply Level Filter
        if ($request->filled('level')) {
            $query->byLevel($request->level);
        }
        
        // Apply Price Range Filter
        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->byPriceRange($request->min_price, $request->max_price);
        }
        
        // Sorting
        $sortBy = $request->get('sort', 'newest');
        switch ($sortBy) {
            case 'price_low':
                $query->orderBy('price_per_hour', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price_per_hour', 'desc');
                break;
            case 'rating':
                // TODO: Add rating sort when reviews are implemented
                $query->orderBy('created_at', 'desc');
                break;
            default: // newest
                $query->orderBy('created_at', 'desc');
        }
        
        $skills = $query->paginate(12);
        $categories = Category::active()->ordered()->get();
        
        return view('pages.browse', compact('skills', 'categories'));
    }

    /**
     * Display the specified skill
     */
    public function show(Skill $skill)
    {
        $skill->load(['user', 'category', 'reviews.reviewer']);
        $skill->incrementViews();
        
        return view('skills.show', compact('skill'));
    }

    /**
     * Show form for managing user's skills
     */
    public function manage()
    {
        $user = auth()->user();
        $mySkills = Skill::where('user_id', $user->id)->with('category')->get();
        $categories = Category::active()->ordered()->get();
        
        return view('skills.manage', compact('mySkills', 'categories'));
    }

    /**
     * Store a newly created skill
     */
    public function store(SkillRequest $request)
    {
        $skill = Skill::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'level' => $request->level,
            'price_per_hour' => $request->price_per_hour,
            'session_duration' => $request->session_duration,
            'location' => $request->location,
            'session_type' => $request->session_type,
        ]);

        logActivity('created', $skill, 'Created skill: ' . $skill->title);

        return redirect()
            ->route('skills.manage')
            ->with('success', 'تم إضافة المهارة بنجاح');
    }

    /**
     * Update the specified skill
     */
    public function update(SkillRequest $request, Skill $skill)
    {
        // Check authorization
        if ($skill->user_id !== auth()->id()) {
            abort(403, 'غير مصرح لك بتعديل هذه المهارة');
        }

        $skill->update($request->validated());

        logActivity('updated', $skill, 'Updated skill: ' . $skill->title);

        return redirect()
            ->route('skills.manage')
            ->with('success', 'تم تحديث المهارة بنجاح');
    }

    /**
     * Toggle skill status
     */
    public function toggleStatus(Skill $skill)
    {
        // Check authorization
        if ($skill->user_id !== auth()->id()) {
            abort(403, 'غير مصرح لك بتعديل هذه المهارة');
        }

        $newStatus = $skill->toggleStatus();
        $statusText = $newStatus ? 'تفعيل' : 'تعطيل';

        return redirect()
            ->route('skills.manage')
            ->with('success', "تم {$statusText} المهارة بنجاح");
    }

    /**
     * Remove the specified skill
     */
    public function destroy(Skill $skill)
    {
        // Check authorization
        if ($skill->user_id !== auth()->id()) {
            abort(403, 'غير مصرح لك بحذف هذه المهارة');
        }

        // Check if skill has sessions
        if ($skill->hasSessions()) {
            return redirect()
                ->route('skills.manage')
                ->with('error', 'لا يمكن حذف المهارة لأنها تحتوي على جلسات');
        }

        $skillTitle = $skill->title;
        $skill->delete();

        logActivity('deleted', null, 'Deleted skill: ' . $skillTitle);

        return redirect()
            ->route('skills.manage')
            ->with('success', 'تم حذف المهارة بنجاح');
    }
}
