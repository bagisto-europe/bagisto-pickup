@php
    $pickupOrder = \Bagisto\Pickup\Models\PickupOrder::where('order_id', $order->id)->first();
@endphp

@if ($pickupOrder)   
    <div class="">
            <p class="font-semibold text-gray-800 dark:text-white">{{ $pickupOrder->inventory->name ?? '-' }}</p>
            <p class="text-gray-600 dark:text-gray-300">@lang('pickup::app.admin.orders.pickup.location')</p>

            <p class="font-semibold text-gray-800 dark:text-white">
                {{ \Carbon\Carbon::parse($pickupOrder->pickup_date)->format('d M, Y') }} 
                {{ \Carbon\Carbon::parse($pickupOrder->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($pickupOrder->end_time)->format('H:i') }}
            </p>
            <p class="text-gray-600 dark:text-gray-300">@lang('pickup::app.admin.orders.pickup.date')</p>
    </div>
@endif
