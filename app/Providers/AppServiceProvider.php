<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        // Vercel terminates TLS, so the PHP function sees the request as HTTP.
        // Force HTTPS so generated asset and link URLs are https://, otherwise
        // browsers block them as mixed content (unstyled page + broken images).
        if (($_SERVER['VERCEL'] ?? $_ENV['VERCEL'] ?? getenv('VERCEL')) !== false) {
            URL::forceScheme('https');
        }
    }
}
