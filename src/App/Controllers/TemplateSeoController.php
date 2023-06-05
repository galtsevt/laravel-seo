<?php

namespace Galtsevt\LaravelSeo\App\Controllers;

use Galtsevt\LaravelSeo\App\Facades\Seo;
use Galtsevt\LaravelSeo\App\Resources\TemplateSeoResource;
use Kontur\Dashboard\App\Facades\Template;

class TemplateSeoController extends \App\Http\Controllers\Controller
{
    public function __construct()
    {
        Seo::breadcrumbs()->addList([
            route('admin.seo.index') => 'SEO',
            route('admin.seo.template.index') => 'Шаблонные SEO теги',
        ]);
    }

    public function index(): \Inertia\Response
    {
        Seo::metaData()->setTitle('Шаблонные SEO теги');

        return Template::render('Modules/Seo/Template/Index', [
            'templates' => TemplateSeoResource::collection(Seo::template()->getAll()),
        ]);
    }
}
