<?php

namespace App\Providers\Filament;

use App\Settings\GlobalSettings;
use App\Settings\StyleSettings;
use Filament\FontProviders\BunnyFontProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\Support\Facades\FilamentColor;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Svg\Style;

class AdminPanelProvider extends PanelProvider
{
    public function boot()
    {  
        FilamentColor::register(function () {
            return [
                // Light mode
                'primaryLight' => Color::hex(app(StyleSettings::class)->primaryLight ?? '#FFFFFF'),
                'secondaryLight' => Color::hex(app(StyleSettings::class)->secondaryLight ?? '#F6F6F6'),
                'tertiaryLight' => Color::hex(app(StyleSettings::class)->tertiaryLight ?? '#DFDAF3'),
                'quaternaryLight' => Color::hex(app(StyleSettings::class)->quaternaryLight ?? '#EED2D3'),
                'quinaryLight' => Color::hex(app(StyleSettings::class)->quinaryLight ?? '#85C3E1'),
                'senaryLight' => Color::hex(app(StyleSettings::class)->senaryLight ?? '#ABDCD5'),

                // Dark mode
                'primaryDark' => Color::hex(app(StyleSettings::class)->primaryDark ?? '#000000'),
                'secondaryDark' => Color::hex(app(StyleSettings::class)->secondaryDark ?? '#111111'),
                'tertiaryDark' => Color::hex(app(StyleSettings::class)->tertiaryDark ?? '#DFDAF3'),
                'quaternaryDark' => Color::hex(app(StyleSettings::class)->quaternaryDark ?? '#EED2D3'),
                'quinaryDark' => Color::hex(app(StyleSettings::class)->quinaryDark ?? '#85C3E1'),
                'senaryDark' => Color::hex(app(StyleSettings::class)->senaryDark ?? '#ABDCD5'),
            ];
        });

        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_START,
            fn (): string => Blade::render('pathfinder.pre-topbar'),
        );
        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_START,
            fn (): string => Blade::render('@vite("resources/js/app.js")'),
        );
        FilamentView::registerRenderHook(
            PanelsRenderHook::USER_MENU_BEFORE,
            fn (): string => Blade::render('pathfinder.user-menu-before'),
        );
        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_END,
            fn (): string => Blade::render('pathfinder.footer'),
        );
    }

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->brandName(fn () => app(GlobalSettings::class)->appName ?? 'Pathfinder')
            ->brandLogo(fn () => view('pathfinder.logo'))
            ->id('admin')
            ->path('admin')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->topNavigation()
            ->login()
            ->globalSearch(false)
            ->font('Figtree', provider: BunnyFontProvider::class)
            ->maxContentWidth(Width::Full)
            ->unsavedChangesAlerts()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\Filament\Clusters')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
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
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
