<?php

namespace Galtsevt\LaravelSeo\Interfaces;

interface SeoInterface
{
    public function seo();

    public function getUrl(): string;

    public function getDate(): string;
}
