<?php
namespace Galtsevt\LaravelSeo\App\Providers;

use Galtsevt\LaravelSeo\App\Services\SeoTools;
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
        $this->app->bind('app.seo.tools', fn() => new SeoTools());
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        Blade::componentNamespace('Galtsevt\\LaravelSeo\\App\\View\\Components', 'laravel-seo');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'laravel-seo');
    }
}
