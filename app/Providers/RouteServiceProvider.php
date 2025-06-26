<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Konfigurasi untuk web routes
            Route::middleware('web')
                ->group(base_path('routes/web.php')); // <-- Memuat web.php

            // Konfigurasi untuk API routes
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Konfigurasi untuk AUTH routes
            // Ini akan memuat semua route dari routes/auth.php
            Route::middleware('auth') // Ini menerapkan middleware 'auth' ke seluruh grup auth.php
                ->group(base_path('routes/auth.php'));

            // Konfigurasi untuk ADMIN routes
            // Ini menerapkan middleware 'admin' (yang kita buat) ke seluruh grup admin.php
            Route::middleware('admin') // 'admin' di sini merujuk ke middleware group di bootstrap/app.php
                ->prefix('admin') // Membuat URL-nya jadi /admin/xyz
                ->name('admin.') // Membuat nama route jadi admin.xyz
                ->group(base_path('routes/admin.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        // Default rate limiting
        // RateLimiter::for('api', function (Request $request) {
        //     return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        // });
    }
}