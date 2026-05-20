<?php

namespace App\Providers;

use App\Models\Image;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        Schema::defaultStringLength(191);
          $settings=Setting::pluck('value','key')->toArray();
          $galleries=Image::where('type','gallery')->latest()->take(6)->get();
         View::share([
        'settings' => $settings,
        'galleries' => $galleries,
    ]);
    
        }
}
