<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'group',
        'key',
        'value',
        'type',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    /**
     * Get a setting value by group and key (e.g. Setting::get('logos', 'navbar_logo')).
     * Optional cache for frontend.
     */
    public static function getValue(string $group, string $key, $default = null)
    {
        $setting = static::where('group', $group)->where('key', $key)->first();
        if (!$setting) {
            return $default;
        }
        return static::castValue($setting->value, $setting->type);
    }

    /**
     * Get all settings for a group as key => value.
     */
    public static function getGroup(string $group): array
    {
        return static::where('group', $group)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->mapWithKeys(function ($s) {
                return [$s->key => static::castValue($s->value, $s->type)];
            })
            ->all();
    }

    /**
     * Get all settings (all groups) for admin.
     */
    public static function getAllGrouped(): array
    {
        return static::orderBy('group')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->groupBy('group')
            ->map(fn ($items) => $items->keyBy('key'))
            ->all();
    }

    protected static function castValue(?string $value, string $type)
    {
        if ($value === null) {
            return null;
        }
        return match ($type) {
            'boolean' => filter_var($value, FILTER_VALIDATE_BOOLEAN),
            'json' => json_decode($value, true),
            default => $value,
        };
    }

    /**
     * Get all settings for frontend (logos, footer, contacts, seo, etc.) with resolved logo/favicon URLs.
     * Caches raw DB data for 1 hour; URL resolution runs per request.
     */
    public static function getSiteForFront(): array
    {
        $groups = Cache::remember('settings_front_groups', 3600, function () {
            return [
                'logos' => static::getGroup('logos'),
                'navbar' => static::getGroup('navbar'),
                'footer' => static::getGroup('footer'),
                'contacts' => static::getGroup('contacts'),
                'seo' => static::getGroup('seo'),
                'services_form' => static::getGroup('services_form'),
            ];
        });

        $logoUrl = function ($path, string $default) {
            if (! $path) {
                return $default;
            }
            return \Illuminate\Support\Str::startsWith($path, 'settings/')
                ? asset('storage/'.$path)
                : asset($path);
        };

        $defaultLogo = asset('nagd-front/assets/images/logos/logo.png');
        $defaultLogoDark = asset('nagd-front/assets/images/logos/logo-dark.png');
        $defaultFavicon = asset('nagd-front/assets/images/logos/icon.png');

        return [
            'logos' => [
                'navbar_logo_url' => $logoUrl($groups['logos']['navbar_logo'] ?? null, $defaultLogoDark),
                'big_nav_logo_url' => $logoUrl($groups['logos']['big_nav_logo'] ?? null, $defaultLogoDark),
                'footer_logo_url' => $logoUrl($groups['logos']['footer_logo'] ?? null, $defaultLogo),
                'favicon_url' => $logoUrl($groups['logos']['favicon'] ?? null, $defaultFavicon),
            ],
            'navbar' => $groups['navbar'],
            'footer' => $groups['footer'],
            'contacts' => $groups['contacts'],
            'seo' => $groups['seo'],
            'services_form' => $groups['services_form'],
        ];
    }

    /**
     * Set a setting value (creates or updates).
     */
    public static function set(string $group, string $key, $value, string $type = 'string'): self
    {
        if (is_array($value) || is_object($value)) {
            $value = json_encode($value);
            $type = 'json';
        }
        if (is_bool($value)) {
            $value = $value ? '1' : '0';
            $type = 'boolean';
        }
        $setting = static::updateOrCreate(
            ['group' => $group, 'key' => $key],
            ['value' => (string) $value, 'type' => $type]
        );
        Cache::forget("settings.{$group}.{$key}");
        Cache::forget('settings_front_groups');
        return $setting;
    }
}
