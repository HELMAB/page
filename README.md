Page
---------------------------
Publishing with the repeat working such as privacy policy and terms & conditions page.

# Installation

```
composer require asorasoft/page
```

Register `PageServiceProvider` in `config/app.php` file

```php
return [
    /*
     * Package Service Providers...
     */
    Asorasoft\Page\Providers\PageServiceProvider::class,
];
```

Publish `page.php` configuration file and then you need to run command `php artisan config:cache`

```shell
php artisan vendor:publish --tag=page-config  --force
php artisan optimize
```

and you can modify those the directory.

```php
<?php

return [
    'route' => [
        'frontend' => 'routes/Api/Frontend',
        'backend' => 'routes/Api/Backend',
    ],
    'controller' => [
        'frontend' => 'app/Http/Controllers/Api/Frontend',
        'backend' => 'app/Http/Controllers/Api/Backend',
    ],
    'types' => [
        'privacy-policy' => 'privacy-policy',
        'terms-and-conditions' => 'terms-and-conditions',
    ],
    'view' => 'resources/views'
];
```

Publish routes, model, migration, controller and view files

```shell
php artisan vendor:publish --tag=page-resource --force
```
# Usage

### Dummy Data

```shell
composer dumpautoload
php artisan db:seed --class=PageTableSeeder
```

### Backend

```php
Route::group(['prefix' => 'page'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('store', 'PageController@store');
        Route::post('show', 'PageController@show');
        Route::post('delete', 'PageController@delete');
        Route::post('datatable', 'PageController@datatable');
        Route::post('toggle', 'PageController@toggle');
    });
});
```

### Frontend

```php
Route::group(['prefix' => 'page'], function () {
    Route::get('{type}', 'PageController@getPage');
});
```

### UI or Webview

The view file is located `resources/views/page.blade.php` 
connect with controller `app/Http/Controllers/PageController`
Please register this route at `routes/web.php` file.

```php
Route::get('page/{type}', 'PageController@getPage');
```
## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
