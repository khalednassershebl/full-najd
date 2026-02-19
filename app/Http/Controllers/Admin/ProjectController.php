<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $query = Project::with('projectCategory')->orderBy('sort_order')->orderBy('id', 'desc');
        $categoryFilter = null;
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
            $categoryFilter = ProjectCategory::find($request->category_id);
        }
        $projects = $query->paginate(15)->withQueryString();
        return view('admin.projects.index', compact('projects', 'categoryFilter'));
    }

    public function create()
    {
        $categories = ProjectCategory::orderBy('sort_order')->orderBy('name')->get();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'category_id' => 'nullable|exists:project_categories,id',
            'subtitle' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'is_published' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'تم إضافة المشروع بنجاح.');
    }

    public function edit(Project $project)
    {
        $categories = ProjectCategory::orderBy('sort_order')->orderBy('name')->get();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $project->id,
            'category_id' => 'nullable|exists:project_categories,id',
            'subtitle' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'is_published' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
            'remove_image' => 'nullable|boolean',
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        if (!empty($validated['remove_image']) && $project->image) {
            Storage::disk('public')->delete($project->image);
            $validated['image'] = null;
        }
        unset($validated['remove_image']);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'تم تحديث المشروع بنجاح.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'تم حذف المشروع بنجاح.');
    }
}
