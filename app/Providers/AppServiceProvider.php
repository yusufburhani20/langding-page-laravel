<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Force HTTPS saat APP_URL menggunakan https (live server)
        if (str_starts_with(config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }

        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            try {
                $settings = \App\Models\Setting::allAsArray();
                $view->with('site_settings', $settings);
                $view->with('site_name', $settings['site_name'] ?? 'TJKT SMK Fadris');
                $view->with('site_logo', $settings['site_logo'] ?? null);
                $view->with('site_favicon', $settings['site_favicon'] ?? null);
                $view->with('site_kontak', \App\Models\Kontak::first());
            } catch (\Exception $e) {
                // Ignore if table doesn't exist yet
            }
        });
    }
}
