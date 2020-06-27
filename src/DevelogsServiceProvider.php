<?php

namespace Dl\Panel;

use Illuminate\Support\ServiceProvider;
use View;
use Dl\Panel\Libraries\Facades\Upload;
use App;
use Illuminate\Support\Facades\Artisan;
use Dl\Panel\Console\Commands\install;
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

        config(['auth.providers.users.model' => Models\User::class]);
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
        $this->loadViewsFrom(__DIR__."/views",'Panel');





        if ($this->app->runningInConsole()) {
            $this->commands([
                dbrefresh::class,
                install::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/Assets/app-assets' => public_path('/app-assets'),
        ], 'public');
        $this->publishes([
            __DIR__.'/Assets/assets' => public_path('/assets'),
        ], 'public');

    }


    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);

        $this->app['config']->set($key,
            array_merge(require $path, $config)
        );
    }
}
