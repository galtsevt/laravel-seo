<?php

namespace Galtsevt\LaravelSeo\App\Traits;

use Galtsevt\LaravelSeo\App\Models\Seo;
use Galtsevt\LaravelSeo\App\Services\SeoService;

trait HasSeo
{
    public function seo(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Seo::class, 'model');
    }

    public function loadSeoFromRequest(): void
    {
        $seoService = new SeoService();
        $seoService->saveData($this);
    }
}
