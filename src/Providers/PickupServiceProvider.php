<?php

namespace Digibytes\Pickup\Providers;

use Illuminate\Support\ServiceProvider;

class PickupServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/system.php', 'core');
        $this->mergeConfigFrom(__DIR__ . '/../config/carriers.php', 'carriers');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'pickup');
    }
}
