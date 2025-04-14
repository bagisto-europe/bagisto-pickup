@php
    $pickupOrder = \Bagisto\Pickup\Models\PickupOrder::where('order_id', $order->id)->first();
@endphp

@if ($pickupOrder)     
    <span class="mt-4 block w-full border-b dark:border-gray-800"></span>
    
    <div class="pt-4">
        <div>
            <p class="font-semibold text-gray-800 dark:text-white">{{ $pickupOrder->inventory->name ?? '-' }}</p>
            <p class="mt-2 font-semibold text-gray-600 dark:text-gray-300">
                {{ $pickupOrder->inventory->street ?? '' }},<br>
                {{ $pickupOrder->inventory->postcode ?? '' }} {{ $pickupOrder->inventory->city ?? '' }},<br>
                {{ $pickupOrder->inventory->state ?? '' }}<br>
                {{ $pickupOrder->inventory->country ?? '' }}
            </p>

            <p class="text-gray-600 dark:text-gray-300">@lang('pickup::app.admin.orders.pickup.location')</p>
        </div>

        <div>
            <p class="pt-4 font-semibold text-gray-800 dark:text-white">
                {{ \Carbon\Carbon::parse($pickupOrder->pickup_date)->format('d M, Y') }}</p>
            <p class="text-gray-600 dark:text-gray-300">@lang('pickup::app.admin.orders.pickup.date')</p>
        </div>

        <div>
            <p class="pt-4 font-semibold text-gray-800 dark:text-white">
                {{ \Carbon\Carbon::parse($pickupOrder->start_time)->format('H:i') }} -
                {{ \Carbon\Carbon::parse($pickupOrder->end_time)->format('H:i') }}
            </p>
            <p class="text-gray-600 dark:text-gray-300">@lang('pickup::app.admin.orders.pickup.time')</p>
        </div>
    </div>
@endif
