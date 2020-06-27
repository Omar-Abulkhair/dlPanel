<?php

namespace Dl\Panel;

use Dl\Panel\Console\Commands\install;
use Illuminate\Support\ServiceProvider;
use View;
use Dl\Panel\Libraries\Facades\Upload;
use App;
use Illuminate\Support\Facades\Artisan;
use Dl\Panel\Console\Commands\dbrefresh;

class DevelogsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('Upload',function() {
            return new Upload;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Artisan::command('ui vue --auth');
        $publishablePath = dirname(__DIR__).'/public';
        config(['auth.providers.users.model' => Models\User::class]);
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
        $this->loadViewsFrom(__DIR__."/views",'Panel');
        $this->publishes([
            __DIR__.$publishablePath.'/assets' => public_path('develogs/panel'),
        ], 'public');

        $this->publishes([
            __DIR__.$publishablePath.'/app-assets' => public_path('develogs/panel'),
        ], 'public');


        if ($this->app->runningInConsole()) {
            $this->commands([
                dbrefresh::class,
                install::class,
            ]);
        }


    }


    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);

        $this->app['config']->set($key,
            array_merge(require $path, $config)
        );
    }
}
