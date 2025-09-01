<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        Vite::prefetch(concurrency: 3);
        JsonResource::withoutWrapping();
        FilamentView::registerRenderHook(
            'panels::auth.login.form.before',
            fn (): View => view('filament.login_extra')
        );
    }
}
