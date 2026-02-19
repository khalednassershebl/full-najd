<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RelatedServicePage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RelatedServicePageController extends Controller
{
    public function index()
    {
        $pages = RelatedServicePage::orderBy('sort_order')->orderBy('id')->paginate(15);
        return view('admin.related-service-pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.related-service-pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:related_service_pages,slug',
            'description' => 'nullable|string',
            'page_content' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        RelatedServicePage::create($validated);

        return redirect()->route('admin.related-service-pages.index')
            ->with('success', 'تم إنشاء صفحة الخدمة ذات الصلة بنجاح.');
    }

    public function edit(RelatedServicePage $relatedServicePage)
    {
        return view('admin.related-service-pages.edit', compact('relatedServicePage'));
    }

    public function update(Request $request, RelatedServicePage $relatedServicePage)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:related_service_pages,slug,' . $relatedServicePage->id,
            'description' => 'nullable|string',
            'page_content' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        $relatedServicePage->update($validated);

        return redirect()->route('admin.related-service-pages.index')
            ->with('success', 'تم تحديث صفحة الخدمة ذات الصلة بنجاح.');
    }

    public function destroy(RelatedServicePage $relatedServicePage)
    {
        $relatedServicePage->delete();
        return redirect()->route('admin.related-service-pages.index')
            ->with('success', 'تم حذف صفحة الخدمة ذات الصلة بنجاح.');
    }
}
