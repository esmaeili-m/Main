<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
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
//        // تغییر مسیر public برای هاست
//        $this->app->bind('path.public', function () {
//            return base_path('../public_html');
//        });
//
//        // ساخت لینک در صورت نیاز
//        $storagePath = base_path('storage/app/public');
//        $publicPath = base_path('../public_html/storage');
//
//        if (!file_exists($publicPath)) {
//            try {
//                symlink($storagePath, $publicPath);
//            } catch (\Exception $e) {
////                \Log::error('Symlink creation failed: ' . $e->getMessage());
//            }
//        }
    }
}
