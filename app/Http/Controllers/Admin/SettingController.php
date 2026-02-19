<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    private const ALLOWED_GROUPS = ['logos', 'navbar', 'footer', 'contacts', 'services_form', 'seo'];

    /**
     * Show the settings page (all groups/tabs).
     */
    public function index()
    {
        $settings = Setting::getAllGrouped();
        $active_tab = request('tab', 'logos');
        if (!in_array($active_tab, self::ALLOWED_GROUPS)) {
            $active_tab = 'logos';
        }
        return view('admin.settings.index', compact('settings', 'active_tab'));
    }

    /**
     * Update settings (by group). Handles file uploads for images.
     */
    public function update(Request $request)
    {
        $group = $request->input('group');
        if (!in_array($group, self::ALLOWED_GROUPS)) {
            return redirect()->route('admin.settings.index', ['tab' => $group])
                ->with('error', 'مجموعة إعدادات غير صالحة.');
        }

        $rules = $this->validationRules($group);
        $validated = $request->validate($rules);

        $inputs = $request->except(['_token', '_method', 'group']);
        $fileKeys = ['navbar_logo', 'big_nav_logo', 'footer_logo', 'favicon', 'og_image'];

        // Build JSON from repeater/array inputs
        if ($group === 'footer') {
            $links = array_values(array_filter(array_map(function ($item) {
                $label = trim($item['label'] ?? '');
                $url = trim($item['url'] ?? '');
                return ($label !== '' || $url !== '') ? ['label' => $label, 'url' => $url] : null;
            }, $request->input('links', []) ?: [])));
            $solutions = array_values(array_filter(array_map(function ($item) {
                $title = trim($item['title'] ?? '');
                $url = trim($item['url'] ?? '');
                return ($title !== '' || $url !== '') ? ['title' => $title, 'url' => $url] : null;
            }, $request->input('solutions', []) ?: [])));
            Setting::set('footer', 'links', $links, 'json');
            Setting::set('footer', 'solutions', $solutions, 'json');
            $inputs = array_diff_key($inputs, ['links' => 1, 'solutions' => 1]);
        }
        if ($group === 'contacts') {
            $social = $request->input('social_media_links', []);
            if (is_array($social)) {
                $social = array_filter(array_map('trim', $social));
                Setting::set('contacts', 'social_media_links', $social, 'json');
            }
            unset($inputs['social_media_links']);
        }
        if ($group === 'services_form') {
            $opts = array_values(array_filter(array_map(function ($item) {
                $value = trim($item['value'] ?? '');
                $label = trim($item['label'] ?? '');
                return ($value !== '' || $label !== '') ? ['value' => $value, 'label' => $label] : null;
            }, $request->input('service_options', []) ?: [])));
            Setting::set('services_form', 'service_options', $opts, 'json');
            $inputs = array_diff_key($inputs, ['service_options' => 1]);
        }
        if ($group === 'navbar') {
            $columns = $request->input('mega_menu_columns', []);
            $megaColumns = [];
            if (is_array($columns)) {
                foreach ($columns as $col) {
                    $title = trim($col['title'] ?? '');
                    $links = [];
                    foreach ($col['links'] ?? [] as $link) {
                        $label = trim($link['label'] ?? '');
                        $url = trim($link['url'] ?? '');
                        if ($label !== '' || $url !== '') {
                            $links[] = ['label' => $label, 'url' => $url];
                        }
                    }
                    $megaColumns[] = ['title' => $title, 'links' => $links];
                }
            }
            Setting::set('navbar', 'mega_menu_content', ['columns' => $megaColumns], 'json');
            unset($inputs['mega_menu_columns']);
        }

        foreach ($inputs as $key => $value) {
            // Handle "remove_*" checkboxes for images
            if (Str::startsWith($key, 'remove_')) {
                $actualKey = substr($key, 7);
                $setting = Setting::where('group', $group)->where('key', $actualKey)->first();
                if ($setting && $setting->type === 'image' && $request->boolean($key)) {
                    if ($setting->value) {
                        Storage::disk('public')->delete($setting->value);
                    }
                    Setting::set($group, $actualKey, null, 'image');
                }
                continue;
            }

            $setting = Setting::where('group', $group)->where('key', $key)->first();
            if (!$setting) {
                continue;
            }

            // File upload
            if (in_array($key, $fileKeys) && $request->hasFile($key)) {
                $file = $request->file($key);
                if ($setting->value) {
                    Storage::disk('public')->delete($setting->value);
                }
                $path = $file->store('settings', 'public');
                Setting::set($group, $key, $path, 'image');
                continue;
            }

            // Skip if this was a file key and we didn't upload (keep current)
            if (in_array($key, $fileKeys)) {
                continue;
            }

            // Boolean: checkbox sends "on" or absent
            if ($setting->type === 'boolean') {
                $value = $request->has($key) && $request->boolean($key) ? '1' : '0';
            }

            if (is_array($value) || is_object($value)) {
                $value = json_encode($value);
            }
            Setting::set($group, $key, $value ?? '', $setting->type);
        }

        return redirect()->route('admin.settings.index', ['tab' => $group])
            ->with('success', 'تم حفظ الإعدادات بنجاح.');
    }

    private function validationRules(string $group): array
    {
        $rules = [
            'group' => ['required', Rule::in(self::ALLOWED_GROUPS)],
        ];

        switch ($group) {
            case 'logos':
                $rules['navbar_logo'] = 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048';
                $rules['big_nav_logo'] = 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048';
                $rules['footer_logo'] = 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048';
                $rules['favicon'] = 'nullable|image|mimes:png|max:512';
                break;
            case 'navbar':
                $rules['navbar_enabled'] = 'nullable';
                $rules['mega_menu_enabled'] = 'nullable';
                $rules['mega_menu_columns'] = 'nullable|array';
                $rules['mega_menu_columns.*.title'] = 'nullable|string|max:255';
                $rules['mega_menu_columns.*.links'] = 'nullable|array';
                $rules['mega_menu_columns.*.links.*.label'] = 'nullable|string|max:255';
                $rules['mega_menu_columns.*.links.*.url'] = 'nullable|string|max:500';
                break;
            case 'footer':
                $rules['description'] = 'nullable|string';
                $rules['links'] = 'nullable|array';
                $rules['links.*.label'] = 'nullable|string|max:255';
                $rules['links.*.url'] = 'nullable|string|max:500';
                $rules['solutions'] = 'nullable|array';
                $rules['solutions.*.title'] = 'nullable|string|max:255';
                $rules['solutions.*.url'] = 'nullable|string|max:500';
                break;
            case 'contacts':
                $rules['phone'] = 'nullable|string|max:50';
                $rules['whatsapp_number'] = 'nullable|string|max:50';
                $rules['email'] = 'nullable|email|max:255';
                $rules['address'] = 'nullable|string';
                $rules['social_media_links'] = 'nullable|array';
                $rules['social_media_links.*'] = 'nullable|string|max:500';
                $rules['map_embed'] = 'nullable|string';
                break;
            case 'services_form':
                $rules['service_options'] = 'nullable|array';
                $rules['service_options.*.value'] = 'nullable|string|max:255';
                $rules['service_options.*.label'] = 'nullable|string|max:255';
                $rules['select_label'] = 'nullable|string|max:255';
                $rules['select_placeholder'] = 'nullable|string|max:255';
                break;
            case 'seo':
                $rules['meta_title'] = 'nullable|string|max:255';
                $rules['meta_description'] = 'nullable|string';
                $rules['meta_keywords'] = 'nullable|string';
                $rules['og_image'] = 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048';
                $rules['og_title'] = 'nullable|string|max:255';
                $rules['og_description'] = 'nullable|string';
                $rules['twitter_card'] = 'nullable|string|max:100';
                $rules['canonical_base'] = 'nullable|url|max:500';
                break;
        }

        return $rules;
    }
}
