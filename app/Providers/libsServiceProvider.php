<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class libsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->bind('App\libs\Item\ItemUseCase','App\libs\Item\ItemMysqlGateway');
        $this->app->bind('App\libs\Item\ItemUseCase','App\libs\Item\ItemOrmEloquentGateway');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
