<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories
     */
    public function index()
    {
        $categories = Category::withCount('skills')->ordered()->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a newly created category
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name_en']);
        }

        $category = Category::create($validated);

        logActivity('created', $category, 'Created category: ' . $category->name_en);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'تم إضافة الفئة بنجاح');
    }

    /**
     * Update the specified category
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug,' . $category->id,
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name_en']);
        }

        $category->update($validated);

        logActivity('updated', $category, 'Updated category: ' . $category->name_en);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'تم تحديث الفئة بنجاح');
    }

    /**
     * Toggle category status (active/inactive)
     */
    public function toggleStatus(Category $category)
    {
        $newStatus = $category->toggleStatus();

        $statusText = $newStatus ? 'تفعيل' : 'تعطيل';
        
        logActivity('toggled_status', $category, "Toggled category status: {$category->name_en} to " . ($newStatus ? 'active' : 'inactive'));

        return redirect()
            ->route('admin.categories.index')
            ->with('success', "تم {$statusText} الفئة بنجاح");
    }

    /**
     * Remove the specified category
     */
    public function destroy(Category $category)
    {
        // Check if category has skills
        if ($category->hasSkills()) {
            return redirect()
                ->route('admin.categories.index')
                ->with('error', 'لا يمكن حذف الفئة لأنها تحتوي على مهارات');
        }

        $categoryName = $category->name_en;
        $category->delete();

        logActivity('deleted', null, 'Deleted category: ' . $categoryName);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'تم حذف الفئة بنجاح');
    }

    /**
     * Get category data as JSON (for API/AJAX)
     */
    public function show(Category $category)
    {
        $category->load('skills');
        
        return response()->json([
            'success' => true,
            'category' => $category,
        ]);
    }
}
