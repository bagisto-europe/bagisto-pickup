<?php

namespace Bagisto\Pickup\Providers;

use Bagisto\Pickup\Listeners\Order;
use Bagisto\Pickup\Listeners\Shipment;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('checkout.order.save.after', Order::class);

        Event::listen('sales.shipment.save.after', Shipment::class);

        Event::listen('bagisto.admin.sales.order.shipping-method.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('pickup::admin.sales.orders.pickup-info');
        });

        Event::listen('bagisto.shop.customers.account.orders.view.shipping_method_details.after', function ($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('pickup::shop.customers.accounts.orders.pickup-info');
        });

    }
}
