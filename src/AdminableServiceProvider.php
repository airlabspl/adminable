<?php

namespace Airlabs\Adminable;

use Airlabs\Adminable\Commands\CreateAdmin;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AdminableServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->config();
        $this->migrations();
        $this->publishing();
        $this->console();
        $this->blade();
    }

    protected function config()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/adminable.php', 'adminable');
    }

    protected function migrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    protected function publishing()
    {
        $this->publishes([
            __DIR__ . '/../config/adminable.php' => config_path('adminable.php')
        ], 'config');
    }

    protected function console()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateAdmin::class
            ]);
        }
    }

    protected function blade()
    {
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->isAdmin();
        });
    }
}
