<?php

namespace App\Providers\Filament;

use App\Enums\Language;
use App\Http\Middleware\SetLocale;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\App;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\UserMenuItem;

/**
 * Admin panel provider for Filament
 * Configures the admin panel with multilingual support
 */
class AdminPanelProvider extends PanelProvider
{
    /**
     * Configure the admin panel
     *
     * @param Panel $panel The panel instance
     * @return Panel The configured panel
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            // Set panel title based on current locale
            ->brandName(fn () => __('common.panel.title'))
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                // Add our custom SetLocale middleware to handle language switching
                SetLocale::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->userMenuItems([
                // Thêm liên kết chuyển đổi sang tiếng Anh
                UserMenuItem::make()
                    ->label(Language::getLanguageName(Language::ENGLISH->value))
                    ->icon('heroicon-o-flag')
                    ->url('/language/' . Language::ENGLISH->value)
                    ->visible(fn() => App::getLocale() !== Language::ENGLISH->value),
                    
                // Thêm liên kết chuyển đổi sang tiếng Việt
                UserMenuItem::make()
                    ->label(Language::getLanguageName(Language::VIETNAMESE->value))
                    ->icon('heroicon-o-flag')
                    ->url('/language/' . Language::VIETNAMESE->value)
                    ->visible(fn() => App::getLocale() !== Language::VIETNAMESE->value),
            ]);
    }
}
