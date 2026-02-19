<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('productCategory')->orderBy('sort_order')->orderBy('id', 'desc');
        $categoryFilter = null;
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
            $categoryFilter = ProductCategory::find($request->category_id);
        }
        $products = $query->paginate(15)->withQueryString();
        return view('admin.products.index', compact('products', 'categoryFilter'));
    }

    public function create()
    {
        $categories = ProductCategory::orderBy('sort_order')->orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'category_id' => 'nullable|exists:product_categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'demo_url' => 'nullable|string|max:500',
            'is_published' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'تم إضافة المنتج بنجاح.');
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::orderBy('sort_order')->orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            'category_id' => 'nullable|exists:product_categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'demo_url' => 'nullable|string|max:500',
            'is_published' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
            'remove_image' => 'nullable|boolean',
        ]);

        $validated['is_published'] = $request->boolean('is_published');
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        if (!empty($validated['remove_image']) && $product->image) {
            Storage::disk('public')->delete($product->image);
            $validated['image'] = null;
        }
        unset($validated['remove_image']);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'تم تحديث المنتج بنجاح.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'تم حذف المنتج بنجاح.');
    }
}
