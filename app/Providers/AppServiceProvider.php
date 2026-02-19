<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share site settings with all views (logos, footer, contacts, seo, services_form, navbar)
        try {
            \Illuminate\Support\Facades\View::share('site', Setting::getSiteForFront());
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\View::share('site', [
                'logos' => [
                    'navbar_logo_url' => asset('nagd-front/assets/images/logos/logo-dark.png'),
                    'big_nav_logo_url' => asset('nagd-front/assets/images/logos/logo-dark.png'),
                    'footer_logo_url' => asset('nagd-front/assets/images/logos/logo.png'),
                    'favicon_url' => asset('nagd-front/assets/images/logos/icon.png'),
                ],
                'navbar' => [],
                'footer' => [],
                'contacts' => [],
                'seo' => [],
                'services_form' => [],
            ]);
        }

        // Helper to get admin asset URL from resources
        \Illuminate\Support\Facades\Blade::directive('adminAsset', function ($path) {
            return "<?php echo url('admin-assets/' . trim($path, '\'')); ?>";
        });
    }
}
