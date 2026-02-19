<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * List all blogs with pagination. Optional filter by category_id.
     */
    public function index(Request $request)
    {
        $query = Blog::with('blogCategory')->orderByRaw('COALESCE(published_at, created_at) DESC')->orderBy('sort_order');
        $categoryFilter = null;
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
            $categoryFilter = BlogCategory::find($request->category_id);
        }
        $blogs = $query->paginate(15)->withQueryString();
        return view('admin.blogs.index', compact('blogs', 'categoryFilter'));
    }

    /**
     * Show form to create a blog post.
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('sort_order')->orderBy('name')->get();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a new blog post.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'category_id' => 'nullable|exists:blog_categories,id',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'تم إضافة المقالة بنجاح.');
    }

    /**
     * Show form to edit a blog post.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::orderBy('sort_order')->orderBy('name')->get();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update a blog post.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'category_id' => 'nullable|exists:blog_categories,id',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'sort_order' => 'nullable|integer|min:0',
            'remove_image' => 'nullable|boolean',
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        if (!empty($validated['remove_image']) && $blog->image) {
            Storage::disk('public')->delete($blog->image);
            $validated['image'] = null;
        }
        unset($validated['remove_image']);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'تم تحديث المقالة بنجاح.');
    }

    /**
     * Delete a blog post.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'تم حذف المقالة بنجاح.');
    }
}
