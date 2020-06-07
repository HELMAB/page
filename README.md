Page
---------------------------
Publishing with the repeat working such as privacy policy and terms & conditions page.

# Installation

`composer require asorasoft/page`

Register `PageServiceProvider` in `config/app.php` file

```php
return [
    /*
     * Package Service Providers...
     */
    Asorasoft\Page\Providers\PageServiceProvider::class,
];
```

Publish routes, model, controller and view files

```
php artisan vendor:publish --provider="Asorasoft\Page\Providers\PageServiceProvider"
```
# Usage

## Backend

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

## Frontend

```php
Route::group(['prefix' => 'page'], function () {
    Route::post('{type}', 'PageController@getPage');
});
```

## UI

The view file is located `resources/views/page.blade.php` 
connect with controller `app/Http/Controllers/PageController`
Please register this route at `routes/web.php` file.
```php
Route::get('page/{type}', 'PageController@getPage');
```
## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
