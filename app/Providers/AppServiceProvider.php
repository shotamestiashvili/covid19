<?php

namespace App\Providers;

use App\Services\Auth\Login\Login;
use App\Services\TestClass;
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
//        $this->app->singleton(Login::class, function () {
//            return new Login();
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


    }
}
