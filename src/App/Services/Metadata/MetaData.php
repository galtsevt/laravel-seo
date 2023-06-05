<?php

namespace Galtsevt\LaravelSeo\App\Services\Metadata;

use Galtsevt\LaravelSeo\App\Models\Seo;
use Illuminate\Database\Eloquent\Model;

class MetaData
{
    protected ?string $title = null;
    protected Seo $seo;

    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->seo?->title ?? $this->title;
    }

    public function getKeywords(): ?string
    {
        return $this->seo?->keywords ?? null;
    }

    public function getDescription(): ?string
    {
        return $this->seo?->description ?? null;
    }

    public function prepare(Model|array $seo): static
    {
        if (is_array($seo)) {
            $this->seo = new Seo($seo);
        } else {
            $this->seo = $seo->seo;
        }
        return $this;
    }
}
