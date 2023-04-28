<?php

namespace Galtsevt\LaravelSeo\App\Services;

use Galtsevt\LaravelSeo\App\Services\Breadcrumbs\BreadcrumbsContainer;
use Galtsevt\LaravelSeo\App\Services\Metadata\MetaData;

class SeoTools
{
    protected BreadcrumbsContainer $breadcrumbs;
    protected MetaData $metaData;


    public function __construct()
    {
        $this->breadcrumbs = new BreadcrumbsContainer();
        $this->metaData = new MetaData();
    }

    public function breadcrumbs(): BreadcrumbsContainer
    {
        return $this->breadcrumbs;
    }

    public function metaData(): MetaData
    {
        return $this->metaData;
    }

}
