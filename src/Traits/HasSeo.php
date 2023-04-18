<?php

namespace Galtsevt\LaravelSeo\Traits;

use Galtsevt\LaravelSeo\Models\Seo;

trait HasSeo
{
    public function seo(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Seo::class, 'foreign_id', 'id')->where('model', get_class($this));
    }
}
