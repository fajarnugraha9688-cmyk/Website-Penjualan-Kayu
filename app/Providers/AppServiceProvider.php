<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
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
        /*
        |--------------------------------------------------------------------------
        | SHARE DATA WEBSITE KE SEMUA BLADE
        |--------------------------------------------------------------------------
        |
        | Data pengaturan website akan otomatis tersedia
        | di seluruh halaman.
        |
        */

        View::composer('*', function ($view) {

            $setting = Setting::first();

            $view->with('setting', $setting);

        });
    }
}