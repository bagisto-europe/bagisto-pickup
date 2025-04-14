<?php

namespace Bagisto\Pickup\Listeners;

use Bagisto\Pickup\Models\PickupOrder;
use Bagisto\Pickup\Models\PickupTimeslot;

class Order
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(object $event)
    {

        $order = $event;
        \Log::info('Order event triggered.', [
            'order_id'        => $order->id,
            'shipping_method' => $order->shipping_method,
        ]);

        if ($order->shipping_method !== 'pickup') {
            return;
        }

        // Get pickup data from the first item in the order
        $firstItem = $order->items->first();
        $pickupData = $firstItem->additional['pickup'] ?? null;

        if (! $pickupData) {
            \Log::warning('Pickup data not found in order item additional field.');

            return;
        }

        // Save the pickup data to the PickupOrder table
        $timeslot = PickupTimeslot::find($pickupData['timeslot']);

        $pickupOrder = PickupOrder::create([
            'order_id'            => $order->id,
            'customer_id'         => $order->customer_id,
            'inventory_source_id' => $pickupData['location'],
            'timeslot_id'         => $timeslot?->id,
            'pickup_date'         => $pickupData['date'],
            'start_time'          => $timeslot?->start_time,
            'end_time'            => $timeslot?->end_time,
        ]);

        if ($pickupOrder) {
            \Log::info('Pickup order created successfully.', [
                'pickup_order_id'     => $pickupOrder->id,
                'order_id'            => $pickupOrder->order_id,
                'customer_id'         => $pickupOrder->customer_id,
                'inventory_source_id' => $pickupOrder->inventory_source_id,
                'timeslot_id'         => $pickupOrder->timeslot_id,
                'pickup_date'         => $pickupOrder->pickup_date,
                'start_time'          => $pickupOrder->start_time,
                'end_time'            => $pickupOrder->end_time,
            ]);
        }
    }
}
