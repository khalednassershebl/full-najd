<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * List all partners with pagination.
     */
    public function index()
    {
        $partners = Partner::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show form to create a partner.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a new partner.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('partners', 'public');
        }

        Partner::create($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'تم إضافة الشريك بنجاح.');
    }

    /**
     * Show form to edit a partner.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update a partner.
     */
    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'remove_image' => 'nullable|boolean',
        ]);

        if (!empty($validated['remove_image']) && $partner->image) {
            Storage::disk('public')->delete($partner->image);
            $validated['image'] = null;
        }
        unset($validated['remove_image']);

        if ($request->hasFile('image')) {
            if ($partner->image) {
                Storage::disk('public')->delete($partner->image);
            }
            $validated['image'] = $request->file('image')->store('partners', 'public');
        }

        $partner->update($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'تم تحديث الشريك بنجاح.');
    }

    /**
     * Delete a partner.
     */
    public function destroy(Partner $partner)
    {
        if ($partner->image) {
            Storage::disk('public')->delete($partner->image);
        }
        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'تم حذف الشريك بنجاح.');
    }
}
