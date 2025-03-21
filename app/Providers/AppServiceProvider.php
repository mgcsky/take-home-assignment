<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->bindInterfaceImplementation();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    private function bindInterfaceImplementation(): void
    {
        $interfaceImplementations = config('interface-implementations', []);

        foreach ($interfaceImplementations as $interface => $service) {
            $interfaceClass = "App\Repository\\$interface";
            $serviceClass = "App\Repository\\$service";
            $this->app->bind($interfaceClass, fn () => new $serviceClass());
        }
    }
}
