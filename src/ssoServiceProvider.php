<?php

namespace miniorange\sso;

use Illuminate\Support\ServiceProvider;

class ssoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('miniorange\sso\ssoController');
        $this->app->make('miniorange\sso\connector');
        $this->app->make('miniorange\sso\classes\Customer');
        $this->app->make('miniorange\sso\register');
        $this->app->make('miniorange\sso\account');
        $this->app->make('miniorange\sso\login');
        $this->app['router']->aliasMiddleware('index', Index::class);
        
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require_once 'autoload.php';
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views','plugin');
        $this->publishes([
            __DIR__.'/includes/css' => public_path('miniorange/sso/includes/css'),
        ], 'public');
        $this->publishes([
            __DIR__.'/includes/js' => public_path('miniorange/sso/includes/js'),
        ], 'public');
        $this->publishes([
            __DIR__.'/resources/' => public_path('miniorange/sso/resources/'),
        ], 'public');
        $this->publishes([
            __DIR__.'/resources/images' => public_path('miniorange/sso/resources/images'),
        ], 'public');
        //
    }
}
