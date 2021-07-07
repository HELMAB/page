Page
---------------------------
Publishing with the repeat working such as privacy policy and terms & conditions page.

![screenshot.png](assets/img/screenshot.png)

## Installation

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

Publish `page.php` configuration file, and you can modify those the directory.

```shell
php artisan vendor:publish --tag=page-config  --force
php artisan optimize
php artisan migrate
```

Publish routes, model, migration, controller and view files

```shell
php artisan vendor:publish --tag=page-resource --force
```
### Usage

Copying those lines into ``routes/web.php`` file

```php
// http://127.0.0.1:8000/legal/terms-and-conditions/<locale, [en, km]>
// http://127.0.0.1:8000/legal/privacy-policy/<locale, [en, km]>
Route::get('legal/{type}/{locale?}', 'PageController@getPage');

include_once ('Api/Backend/page.php');
include_once ('Api/Frontend/page.php');
```

We already define default some content of legal page

```shell
composer dumpautoload
php artisan db:seed --class=PageTableSeeder
```

After you seeds dummy data, you can access [terms-and-conditions](http://127.0.0.1:8000/legal/terms-and-conditions) and [privacy-policy](http://127.0.0.1:8000/legal/privacy-policy) page.

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email mabhelitc@gmail.com instead of using the issue tracker.

## Credits

-   [Mab Hel](https://github.com/asorasoft)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
