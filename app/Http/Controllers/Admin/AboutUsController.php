<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Show the form for editing About Us (who-we-are section + about page content).
     */
    public function index()
    {
        $aboutUs = AboutUs::getInstance();
        return view('admin.about-us.index', compact('aboutUs'));
    }

    /**
     * Update the specified About Us content.
     */
    public function update(Request $request)
    {
        $aboutUs = AboutUs::getInstance();

        $validated = $request->validate([
            'home_section_label' => 'nullable|string|max:255',
            'home_section_heading' => 'nullable|string',
            'home_section_description' => 'nullable|string',
            'home_vision_title' => 'nullable|string|max:255',
            'home_vision_text' => 'nullable|string',
            'home_values_title' => 'nullable|string|max:255',
            'home_values_text' => 'nullable|string',
            'home_feature_1' => 'nullable|string|max:255',
            'home_feature_2' => 'nullable|string|max:255',
            'home_feature_3' => 'nullable|string|max:255',
            'home_section_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:5120',
            'remove_home_section_image' => 'nullable|boolean',
            'about_page_content' => 'nullable|string',
        ]);

        if (!empty($validated['remove_home_section_image']) && $aboutUs->home_section_image) {
            Storage::disk('public')->delete($aboutUs->home_section_image);
            $validated['home_section_image'] = null;
        }
        unset($validated['remove_home_section_image']);

        if ($request->hasFile('home_section_image')) {
            if ($aboutUs->home_section_image) {
                Storage::disk('public')->delete($aboutUs->home_section_image);
            }
            $validated['home_section_image'] = $request->file('home_section_image')
                ->store('about-us', 'public');
        }

        $aboutUs->update($validated);

        return redirect()->route('admin.about-us.index')
            ->with('success', 'تم حفظ التعديلات بنجاح.');
    }
}
