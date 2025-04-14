<?php

namespace Bagisto\Pickup\Payment;

use Webkul\Payment\Payment\Payment;

class Instore extends Payment
{
    /**
     * Payment method code.
     *
     * @var string
     */
    protected $code = 'instore';

    /**
     * Check if payment method is available.
     *
     * @return bool
     */
    public function isAvailable()
    {
        $cart = $this->getCart();

        $status = core()->getConfigData('sales.payment_methods.instore.active');

        if (! $cart) {
            return false;
        }

        if (! $status) {
            return false;
        }

        if ($cart->shipping_address && $cart->shipping_method == 'pickup') {
            return true;
        }
    }

    /**
     * Get redirect url.
     *
     * @var string
     */
    public function getRedirectUrl()
    {
        // Implementation code goes here
    }

    /**
     * Get payment method image.
     *
     * @return array
     */
    public function getImage()
    {
        $url = $this->getConfigData('image');

        return $url ? Storage::url($url) : bagisto_asset('images/cash-on-delivery.png', 'shop');
    }
}
