<?php

namespace Galtsevt\LaravelSeo\App\Services;

use Galtsevt\LaravelSeo\App\Models\Seo;
use Galtsevt\LaravelSeo\App\Requests\SeoRequest;
use Illuminate\Database\Eloquent\Model;

class SeoService
{
    private SeoRequest $request;

    public function __construct()
    {
        $this->request = app(SeoRequest::class);
    }

    public function saveData(Model $model): void
    {
        $data = $this->request->validated();
        if (isset($data['seo'])) {
            $data['seo']['site_map'] = $data['seo']['site_map'] ?? 0;
            $search = [
                'model_type' => get_class($model),
                'model_id' => $model->id,
            ];
            $data = array_merge($search, $data['seo']);
            $model->seo()->updateOrCreate($search, $data);
        }
    }

    public function makeSitemap(SiteMapGenerator $siteMapGenerator): void
    {
        $pages = Seo::query()->where('site_map', 1)->get();
        foreach ($pages as $page) {
            $siteMapGenerator->add($page->relatedModel->getUrl(), $page->relatedModel->getDate(), $page->priority, $page->changefreq);
        }
        $siteMapGenerator->saveToFile(public_path('sitemap.xml'));
    }
}
