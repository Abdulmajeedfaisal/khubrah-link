<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Category;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of skills
     */
    public function index(Request $request)
    {
        $query = Skill::with(['user', 'category']);

        // Search
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $skills = $query->latest()->paginate(20);
        
        // Get categories for filter
        $categories = Category::active()->ordered()->get();
        
        // Get stats
        $stats = [
            'total' => Skill::count(),
            'active' => Skill::where('is_active', true)->count(),
            'inactive' => Skill::where('is_active', false)->count(),
            'with_sessions' => Skill::has('sessions')->count(),
        ];

        return view('admin.skills.index', compact('skills', 'categories', 'stats'));
    }

    /**
     * Display the specified skill
     */
    public function show(Skill $skill)
    {
        $skill->load(['user', 'category', 'sessions', 'reviews']);

        return view('admin.skills.show', compact('skill'));
    }

    /**
     * Toggle skill status
     */
    public function toggleStatus(Skill $skill)
    {
        $newStatus = $skill->toggleStatus();
        $statusText = $newStatus ? 'تفعيل' : 'تعطيل';

        logActivity('toggled_status', $skill, "Toggled skill status: {$skill->title} to " . ($newStatus ? 'active' : 'inactive'));

        return redirect()
            ->back()
            ->with('success', "تم {$statusText} المهارة بنجاح");
    }

    /**
     * Remove the specified skill
     */
    public function destroy(Skill $skill)
    {
        // Check if skill has sessions
        if ($skill->hasSessions()) {
            return redirect()
                ->back()
                ->with('error', 'لا يمكن حذف المهارة لأنها تحتوي على جلسات');
        }

        $skillTitle = $skill->title;
        $skill->delete();

        logActivity('deleted', null, 'Admin deleted skill: ' . $skillTitle);

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'تم حذف المهارة بنجاح');
    }
}
