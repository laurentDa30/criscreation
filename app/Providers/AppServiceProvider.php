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
        View::composer('layouts.public', function ($view) {
            $view->with('settings', [
                'salon_name' => Setting::get('salon_name', 'Cris Création'),
                'salon_address' => Setting::get('salon_address', '123 Rue de la Beauté, 75001 Paris'),
                'salon_phone' => Setting::get('salon_phone', '01 23 45 67 89'),
                'salon_email' => Setting::get('salon_email', 'contact@criscreation.fr'),
                'opening_hours' => Setting::get('opening_hours', ''),
            ]);
        });
    }
}
