<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::withCount('products')->orderBy('sort_order')->orderBy('name')->paginate(15);
        return view('admin.product-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.product-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:product_categories,slug',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);
        ProductCategory::create($validated);
        return redirect()->route('admin.product-categories.index')
            ->with('success', 'تم إضافة تصنيف المنتجات بنجاح.');
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product-categories.edit', compact('productCategory'));
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:product_categories,slug,' . $productCategory->id,
            'sort_order' => 'nullable|integer|min:0',
        ]);
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);
        $productCategory->update($validated);
        return redirect()->route('admin.product-categories.index')
            ->with('success', 'تم تحديث التصنيف بنجاح.');
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->products()->update(['category_id' => null]);
        $productCategory->delete();
        return redirect()->route('admin.product-categories.index')
            ->with('success', 'تم حذف التصنيف بنجاح.');
    }
}
