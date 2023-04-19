<?php

namespace Galtsevt\LaravelSeo\Services;

use Galtsevt\LaravelSeo\Services\Breadcrumbs\BreadcrumbsContainer;
use Galtsevt\LaravelSeo\Services\Metadata\MetaData;

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
