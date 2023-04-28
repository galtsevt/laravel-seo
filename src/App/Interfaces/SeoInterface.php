<?php

namespace Galtsevt\LaravelSeo\App\Interfaces;

interface SeoInterface
{
    public function seo(): \Illuminate\Database\Eloquent\Relations\MorphOne;

    public function getUrl(): string;

    public function getDate(): string;
}
