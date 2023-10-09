<?php

namespace Flysion\Value;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/helper.php';
        $this->app->bind('@and', _AND::class);
        $this->app->bind('@or', _OR::class);
        $this->app->bind('@not', _NOT::class);
        $this->app->bind('@eq', EQ::class);
        $this->app->bind('@ne', NE::class);
        $this->app->bind('@gt', GT::class);
        $this->app->bind('@ge', GE::class);
        $this->app->bind('@lt', LT::class);
        $this->app->bind('@le', LE::class);
        $this->app->bind('@in', IN::class);
        $this->app->bind('@notIn', NOTIN::class);
        $this->app->bind('@v', ContextValue::class);
    }

    public function provides()
    {

    }
}
