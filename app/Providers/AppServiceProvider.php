<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();

        /* Http::macro('sauverexchange', function () {
            return Http::withHeaders([
                'X-Example' => 'example',
            ])->baseUrl('http://test.sauverexchange.com/api/v2');
        }); */
    }
}
