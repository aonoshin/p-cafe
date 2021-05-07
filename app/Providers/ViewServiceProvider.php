<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\HeaderBgComposer;
use App\Http\View\Composers\AreaSideMenuComposer;
use App\Http\View\Composers\TemaSideMenuComposer;
use App\Http\View\Composers\CreatedSideMenuComposer;
use App\Http\View\Composers\UpdatedSideMenuComposer;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('home.index', HeaderBgComposer::class);
        View::composer('*', AreaSideMenuComposer::class);
        View::composer('*', TemaSideMenuComposer::class);
        View::composer('*', CreatedSideMenuComposer::class);
        View::composer('*', UpdatedSideMenuComposer::class);
    }
}
