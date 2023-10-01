<?php

namespace App\Providers;

use App\Services\Map\Map;
use App\Services\Satelite\Satelite;
use App\Services\Geolocation\Geolocation;
use Illuminate\Support\ServiceProvider;

class GeolocationProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(Geolocation::class, function($app){
          
            return new Geolocation(new Map(), new Satelite());
        } );
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
