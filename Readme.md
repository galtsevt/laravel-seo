# Пакет элементы Формы


1. [ ] **`laravel 9/10`**

## Установка
1) Установить пакет `composer require galsevt/laravel-seo`
2) выполнить миграции `php artisan migrate`
## Использование  
Расширить модель с помощью trait  
`Galtsevt\LaravelSeo\Traits\HasSeo`  
Добавить интерфейс SeoInterface.  
`Galtsevt\LaravelSeo\Interfaces\SeoInterface`  
Модель должна реализовать методы интерфейса:  
`public function getUrl(): string;   
public function getDate(): string;`

Добавление и обновление сео через SeoService передав модель методу saveData:    
`$seoService->saveData($news);`  
Автоматическая генерация карты сайта, каждый день в час ночи:  
`$schedule->call(function () {  
$service = new SeoService();  
$service->makeSitemap(new SiteMapGenerator());  
})->dailyAt('1:00');`
