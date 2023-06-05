<?php

namespace Galtsevt\LaravelSeo\App\Models;

use Galtsevt\LaravelSeo\App\Traits\HasSeo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoForUrl extends Model
{
    use HasFactory, HasSeo;

    protected $with = ['seo'];

    protected $table = 'url_seo';

    protected $guarded = false;

}
