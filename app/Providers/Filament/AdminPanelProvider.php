<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
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
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use pxlrbt\FilamentSpotlight\SpotlightPlugin;

class AdminPanelProvider extends PanelProvider
{        
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('/')
            ->login()
            ->colors([
                'primary' => Color::Blue,
            ])

            ->plugins([
                SpotlightPlugin::make()
            ])

            ->sidebarCollapsibleOnDesktop()

            ->navigationItems([

                // this is for the user manual page
                NavigationItem::make('User Manual')

                //url will be change when the system is complete

                ->url('https://docs.google.com/document/d/1Boq1CuUWelwK_lbQpv4w8Bt1fYnr0xa2S2ZBMw_ZoCc/edit?usp=sharing', shouldOpenInNewTab:true)

                ->icon('heroicon-s-information-circle')
                ->group('Guide')
                ->sort(2)
            ])

            ->navigationItems([

                // this is for the feedback to be fill up, you can change the link
                NavigationItem::make('Feedback')

                //url will be change when it need to be updated
                ->url('https://forms.gle/oofsT22pbQNM8d2x8', shouldOpenInNewTab:true)
                ->icon('heroicon-s-link')
                ->group('Guide')
                ->sort(2)
            ])

            ->favicon(asset('images/barugo-logo.jpg'))
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
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
