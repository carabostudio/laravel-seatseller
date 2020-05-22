<?php

namespace Carabostudio\Seatseller;

use Illuminate\Support\ServiceProvider;


/**
 * Class SeatsellerServiceProvider
 * @package Carabostudio\Seatseller
 */
class SeatsellerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('seatseller', SeatsellerManager::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../config/seatseller.php' => config_path('seatseller.php')
        ]);

    }
}
