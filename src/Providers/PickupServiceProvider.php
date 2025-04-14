<?php

namespace Bagisto\Pickup\Providers;

use Bagisto\Pickup\Console\Commands\Install;
use Bagisto\Pickup\Http\Controllers\Shop\API\OnePageController;
use Bagisto\Pickup\Payment\Payment;
use Illuminate\Support\ServiceProvider;
use Webkul\Payment\Payment as CorePayment;
use Webkul\Shop\Http\Controllers\API\OnepageController as BaseOnepageController;

class PickupServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/Config/acl.php', 'acl');

        $this->mergeConfigFrom(dirname(__DIR__).'/Config/carriers.php', 'carriers');

        $this->mergeConfigFrom(dirname(__DIR__).'/Config/system.php', 'core');

        $this->mergeConfigFrom(dirname(__DIR__).'/Config/admin-menu.php', 'menu.admin');

        $this->mergeConfigFrom(dirname(__DIR__).'/Config/paymentmethods.php', 'payment_methods');

        $this->app->bind(CorePayment::class, Payment::class);

        $this->app->bind(BaseOnepageController::class, OnepageController::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');

        $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'pickup');

        $this->loadRoutesFrom(dirname(__DIR__).'/Routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'pickup');

        $this->publishes([
            __DIR__.'/../Resources/lang'        => $this->app->langPath('vendor/pickup'),
            __DIR__.'/../Resources/views/admin' => $this->app->resourcePath('admin-themes/default/views'),
            __DIR__.'/../Resources/views/shop'  => $this->app->resourcePath('themes/default/views'),
        ], 'pickup');

        $this->app->register(EventServiceProvider::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                Install::class,
            ]);
        }
    }
}
