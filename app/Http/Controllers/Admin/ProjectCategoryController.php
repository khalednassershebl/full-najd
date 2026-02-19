<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::withCount('projects')->orderBy('sort_order')->orderBy('name')->paginate(15);
        return view('admin.project-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.project-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:project_categories,slug',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);
        ProjectCategory::create($validated);
        return redirect()->route('admin.project-categories.index')
            ->with('success', 'تم إضافة التصنيف بنجاح.');
    }

    public function edit(ProjectCategory $projectCategory)
    {
        return view('admin.project-categories.edit', compact('projectCategory'));
    }

    public function update(Request $request, ProjectCategory $projectCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:project_categories,slug,' . $projectCategory->id,
            'sort_order' => 'nullable|integer|min:0',
        ]);
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);
        $projectCategory->update($validated);
        return redirect()->route('admin.project-categories.index')
            ->with('success', 'تم تحديث التصنيف بنجاح.');
    }

    public function destroy(ProjectCategory $projectCategory)
    {
        $projectCategory->projects()->update(['category_id' => null]);
        $projectCategory->delete();
        return redirect()->route('admin.project-categories.index')
            ->with('success', 'تم حذف التصنيف بنجاح.');
    }
}
