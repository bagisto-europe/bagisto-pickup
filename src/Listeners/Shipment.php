<?php

namespace Bagisto\Pickup\Listeners;

use Bagisto\Pickup\Mail\Shop\Order\PickupNotification;
use Webkul\Shop\Listeners\Base;
use Webkul\Shop\Mail\Order\ShippedNotification;

class Shipment extends Base
{
    /**
     * After order is created
     *
     * @param  \Webkul\Sales\Contracts\Shipment  $shipment
     * @return void
     */
    public function handle($shipment)
    {
        try {
            \Log::info('Shipment event triggered.', [
                'shipment_id'     => $shipment->id,
                'shipping_method' => $shipment->order->shipping_method,
            ]);

            if (! core()->getConfigData('emails.general.notifications.emails.general.notifications.new_shipment')) {
                return;
            }

            \Log::info('Preparing email for shipment.', [
                'shipment_id'     => $shipment->id,
                'shipping_method' => $shipment->order->shipping_method,
            ]);

            if ($shipment->order->shipping_method === 'pickup') {
                $this->prepareMail($shipment, new PickupNotification($shipment));
                \Log::info('Pickup shipment email sent.');
            } else {
                $this->prepareMail($shipment, new ShippedNotification($shipment));
                \Log::info('Regular shipment email sent.');

            }

            $shipment->query()->update(['email_sent' => 1]);
        } catch (\Exception $e) {
            report($e);
        }
    }
}
