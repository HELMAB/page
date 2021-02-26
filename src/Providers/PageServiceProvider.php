<?php

namespace Asorasoft\Page\Providers;

use Asorasoft\Page\Console\Commands\PageCommand;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../Config' => base_path('config'),
        ], 'page-config');

        $this->publishes([
            __DIR__ . '/../Models' => base_path('app/Models'),
            __DIR__ . '/../Migrations' => base_path('database/migrations'),
            __DIR__ . '/../Database' => base_path('public/pages'),
            __DIR__ . '/../Seeds' => base_path('database/seeds'),
            __DIR__ . '/../Views' => base_path(config('page.view', 'resources/views')),
            __DIR__ . '/../Routes/Frontend' => base_path(config('page.route.frontend')),
            __DIR__ . '/../Routes/Backend' => base_path(config('page.route.backend')),
            __DIR__ . '/../Controllers/Frontend' => base_path(config('page.controller.frontend')),
            __DIR__ . '/../Controllers/Backend' => base_path(config('page.controller.backend')),
            __DIR__ . '/../Controllers/Ui' => base_path('app/Http/Controllers'),
        ], 'page-resource');
    }
}
