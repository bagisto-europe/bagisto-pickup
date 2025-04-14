@php
    $pickupOrder = \Bagisto\Pickup\Models\PickupOrder::where('order_id', $shipment->order->id)->first();
@endphp

@component('shop::emails.layout')
    <div style="margin-bottom: 34px;">
        <span style="font-size: 22px;font-weight: 600;color: #121A26">
            @lang('pickup::app.shop.emails.orders.pickup.ready_subject')
        </span> <br>

        <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
            @lang('shop::app.emails.dear', ['customer_name' => $shipment->order->customer_full_name]), 👋
        </p>

        <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
            @lang('pickup::app.shop.emails.orders.pickup.ready_message', [
                'invoice_id' => $shipment->increment_id,
                'order_id'   => '<a href="' . route('shop.customers.account.orders.view', $shipment->order_id) . '" style="color: #2969FF;">#' . $shipment->order->increment_id . '</a>',
                'created_at' => core()->formatDate($shipment->order->created_at, 'Y-m-d H:i:s')
            ])
        </p>
    </div>

    <div style="font-size: 20px;font-weight: 600;color: #121A26">
        @lang('pickup::app.shop.emails.orders.pickup.details')
    </div>

    @if ($pickupOrder)
        <div style="margin-top: 20px;margin-bottom: 40px;">
            <div style="font-size: 16px; font-weight: 400; color: #384860; line-height: 25px;">
                <strong>@lang('pickup::app.admin.orders.pickup.location')</strong><br>
                {{ $pickupOrder->inventory->name ?? '-' }}<br><br>

                <strong>@lang('pickup::app.admin.orders.pickup.date')</strong><br>
                {{ \Carbon\Carbon::parse($pickupOrder->pickup_date)->format('d M, Y') }} 
                {{ \Carbon\Carbon::parse($pickupOrder->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($pickupOrder->end_time)->format('H:i') }}
            </div>
        </div>
    @endif

    @if ($shipment->order->billing_address)
        <div style="line-height: 25px; margin-bottom: 40px;">
            <div style="font-size: 16px;font-weight: 600;color: #121A26;">
                @lang('shop::app.emails.orders.billing-address')
            </div>

            <div style="font-size: 16px;font-weight: 400;color: #384860;">
                {{ $shipment->order->billing_address->company_name ?? '' }}<br/>
                {{ $shipment->order->billing_address->name }}<br/>
                {{ $shipment->order->billing_address->address }}<br/>
                {{ $shipment->order->billing_address->postcode . " " . $shipment->order->billing_address->city }}<br/>
                {{ $shipment->order->billing_address->state }}<br/>
                ---<br/>
                @lang('shop::app.emails.orders.contact') : {{ $shipment->order->billing_address->phone }}
            </div>

            <div style="font-size: 16px;font-weight: 600;color: #121A26;">
                @lang('shop::app.emails.orders.payment')
            </div>

            <div style="font-size: 16px;font-weight: 400;color: #384860;">
                {{ core()->getConfigData('sales.payment_methods.' . $shipment->order->payment->method . '.title') }}
            </div>
        </div>
    @endif

    <div style="padding-bottom: 40px;border-bottom: 1px solid #CBD5E1;">
        <table style="overflow-x: auto; border-collapse: collapse; border-spacing: 0; width: 100%">
            <thead>
                <tr style="color: #121A26;border-top: 1px solid #CBD5E1;border-bottom: 1px solid #CBD5E1;">
                    @foreach (['sku', 'name', 'price', 'qty'] as $item)
                        <th style="text-align: left;padding: 15px">
                            @lang('shop::app.emails.orders.' . $item)
                        </th>
                    @endforeach
                </tr>
            </thead>

            <tbody style="font-size: 16px;font-weight: 400;color: #384860;">
                @foreach ($shipment->items as $item)
                    <tr>
                        <td style="text-align: left;padding: 15px">{{ $item->sku }}</td>
                        <td style="text-align: left;padding: 15px">
                            {{ $item->name }}
                            @if (isset($item->additional['attributes']))
                                <div>
                                    @foreach ($item->additional['attributes'] as $attribute)
                                        @if (!isset($attribute['attribute_type']) || $attribute['attribute_type'] !== 'file')
                                            <b>{{ $attribute['attribute_name'] }}: </b>{{ $attribute['option_label'] }}<br>
                                        @else
                                            {{ $attribute['attribute_name'] }} :
                                            <a href="{{ Storage::url($attribute['option_label']) }}"
                                               download="{{ File::basename($attribute['option_label']) }}">
                                                {{ File::basename($attribute['option_label']) }}
                                            </a><br>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </td>
                        <td style="text-align: left;padding: 15px">
                            {{ core()->formatPrice($item->price, $shipment->order->order_currency_code) }}
                        </td>
                        <td style="text-align: left;padding: 15px">{{ $item->qty }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endcomponent
