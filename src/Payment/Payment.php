<?php

namespace Bagisto\Pickup\Payment;

use Illuminate\Support\Facades\Config;
use Webkul\Checkout\Facades\Cart;
use Webkul\Payment\Payment as BasePayment;

class Payment extends BasePayment
{
    /**
     * Returns filtered payment methods.
     *
     * @return array
     */
    public function getPaymentMethods()
    {
        $cart = Cart::getCart();

        $payInstore = core()->getConfigData('sales.carriers.pickup.only_instore_payment');

        $paymentMethods = [];

        foreach (Config::get('payment_methods') as $paymentMethodConfig) {
            $paymentMethod = app($paymentMethodConfig['class']);

            if ($paymentMethod->isAvailable()) {
                $paymentMethods[] = [
                    'method'       => $paymentMethod->getCode(),
                    'method_title' => $paymentMethod->getTitle(),
                    'description'  => $paymentMethod->getDescription(),
                    'sort'         => $paymentMethod->getSortOrder(),
                    'image'        => $paymentMethod->getImage(),
                ];
            }
        }

        if ($cart && $cart->shipping_method === 'pickup') {
            if ($payInstore) {
                $paymentMethods = array_filter($paymentMethods, function ($method) {
                    return $method['method'] === 'instore';
                });
            } else {
                $paymentMethods = array_filter($paymentMethods, function ($method) {
                    return $method['method'] !== 'cashondelivery';
                });
            }
        }

        usort($paymentMethods, fn ($a, $b) => $a['sort'] <=> $b['sort']);

        return $paymentMethods;
    }
}
