<?php

namespace Galtsevt\LaravelSeo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Galtsevt\LaravelSeo\Services\SeoTools breadcrumbs()
 * @method static \Galtsevt\LaravelSeo\Services\SeoTools metaData()
 *
 * @see \Galtsevt\LaravelSeo\Services\SeoTools
 *
 **/

class Seo extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'app.seo.tools';
    }
}
