<?php

namespace Galtsevt\LaravelSeo\App\Services\Metadata;

class MetaData
{
    protected ?string $title;
    protected ?string $description;
    protected ?string $keywords;

    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title ?? null;
    }
}
