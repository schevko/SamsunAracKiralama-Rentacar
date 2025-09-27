<?php

namespace App\Providers;

use App\Services\AiBlogService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(AiBlogService::class , function($app){
            return new AiBlogService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(app()->environment('production')){
            URL::forceScheme('https');
        }
    }
}
