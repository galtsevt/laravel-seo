# Seo package for laravel


1. [ ] **`laravel 9/10`**

## Установка
1) Установить пакет `composer require galsevt/laravel-seo`
2) выполнить миграции `php artisan migrate`
Модуль используется для управления meta данными, хлебными крошками, а так же для генерации карты сайта.

### **Использование**

Расширить модель с помощью **trait Galtsevt\\LaravelSeo\\Traits\\HasSeo**, после добавления данного трейта модель будет автоматически искать seo в запросе при создании и обновлении.

Добавить интерфейс SitemapContract.  
**Galtsevt\\\\LaravelSeo\\\\Interfaces\\\\SitemapContract** 

```php
<?php

namespace Kontur\News\App\Models;


use Galtsevt\LaravelSeo\App\Interfaces\SitemapContract; // [tl! add]
use Galtsevt\LaravelSeo\App\Traits\HasSeo; // [tl! add]

class News extends Model implements SitemapContract
{
    use HasFactory, HasSeo;
}
```

По умолчанию карта сайта генерируется на лету при обращении к контроллеру, но вероятно в будущем, в особенности из за магазина, вам понадобиться генерировать карту сайта запуском php из консоли. 

Автоматическая генерация карты сайта, каждый день в час ночи:

```php
$schedule->call(function () {  
    $sitemapGenerator = new SiteMapGenerator();  
    $sitemapGenerator->saveToFile();  
})->dailyAt('1:00');
```

#### **Хлебные крошки**

Добавление хлебных крошек через фасад **Galtsevt\\LaravelSeo\\Facades\\Seo**, можно добавить как один элемент:

```php
Seo::breadcrumbs()->add('Name', 'Url'); // Один элемент
```

Так и сразу несколько:

```php
Seo::breadcrumbs()->addList([
  'url' => 'name',
  'url1' => 'name1',
]);  // несколько элементов
```

**Получить весь список:**

```php
Seo::breadcrumbs()->getAll();
```

**Вывести через готовый blade component:**

```html
<x-laravel-seo::breadcrumbs/>
```

### **Seo данные**

Доступ к мета данным через фасад **Galtsevt\\LaravelSeo\\Facades\\Seo**

```php
Seo::metaData();
```

**Извлечь отношения seo из модели**

```php
Seo::metaData()->prepare($news)
```

**Извлечь отношения seo и при их отсутствии попытаться запросить из базы шаблонные данные**

```php
Seo::metaData()->prepare($news)->withTemplate();
```

### **Шаблонные seo**

Шаблонные seo относятся к моделям, для регистрации достаточно название которое будет отображаться в админ панели и модель которую вы хотите зарегистрировать.

Добавление происходит через фасад **Seo** в **ServiceProvider** вашего модуля.

```php
Seo::template()->add(
    new TemplateSeo(
        name: 'Новости',
        model: News::class,
    )
);
```
