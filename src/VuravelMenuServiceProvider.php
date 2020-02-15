<?php

namespace Vuravel\Menu;

use Illuminate\Support\ServiceProvider;
use Vuravel\Menu\Commands\{MakeMenu, MakeNavbar, MakeSidebar};

class VuravelMenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('vuravel.menus.from_database'))
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'vuravel-menu');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        if (file_exists($file = __DIR__.'/helpers.php'))
            require_once $file;

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeMenu::class,
                MakeNavbar::class,
                MakeSidebar::class,
            ]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
