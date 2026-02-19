<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::withCount('blogs')->orderBy('sort_order')->orderBy('name')->paginate(15);
        return view('admin.blog-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_categories,slug',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);
        BlogCategory::create($validated);
        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'تم إضافة التصنيف بنجاح.');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog-categories.edit', compact('blogCategory'));
    }

    public function update(Request $request, BlogCategory $blogCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_categories,slug,' . $blogCategory->id,
            'sort_order' => 'nullable|integer|min:0',
        ]);
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);
        $blogCategory->update($validated);
        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'تم تحديث التصنيف بنجاح.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->blogs()->update(['category_id' => null]);
        $blogCategory->delete();
        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'تم حذف التصنيف بنجاح.');
    }
}
