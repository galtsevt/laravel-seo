<?php
namespace Galtsevt\LaravelSeo\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SeoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        Blade::componentNamespace('Galtsevt\\LaravelSeo\\Components', 'laravel-seo');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-seo');
    }
}
