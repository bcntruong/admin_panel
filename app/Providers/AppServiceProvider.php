<?php

namespace App\Providers;

use App\Enums\Language;
use App\Filament\LanguageSwitcherPlugin;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\AlpineComponent;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

/**
 * Application service provider
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Set locale from session if available
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            if (Language::isValid($locale)) {
                App::setLocale($locale);
            }
        }
    }
}
