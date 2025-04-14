<?php

namespace Bagisto\Pickup\Carriers;

use Webkul\Checkout\Facades\Cart;
use Webkul\Checkout\Models\CartShippingRate;
use Webkul\Inventory\Models\InventorySource;
use Webkul\Product\Models\ProductInventory;
use Webkul\Shipping\Carriers\AbstractShipping;

class Pickup extends AbstractShipping
{
    /**
     * Shipping method code.
     *
     * @var string
     */
    protected $code = 'pickup';

    /**
     * Calculate shipping rate.
     *
     * @return CartShippingRate|false
     */
    public function calculate()
    {
        if (! $this->isAvailable()) {
            return false;
        }

        $cart = Cart::getCart();

        $carrierTitle = core()->getConfigData('sales.carriers.pickup.title') ?? 'Pickup';
        $carrierDesc = core()->getConfigData('sales.carriers.pickup.description') ?? 'Pickup';

        $shippingRate = new CartShippingRate;

        $shippingRate->carrier = $this->code;
        $shippingRate->carrier_title = $carrierTitle;
        $shippingRate->method = $this->code;
        $shippingRate->method_title = $carrierTitle;
        $shippingRate->method_description = $carrierDesc;
        $shippingRate->price = 0.00;
        $shippingRate->base_price = 0.00;

        return $shippingRate;
    }

    /**
     * Get available pickup locations based on cart items.
     *
     * @return array
     */
    public function getAvailableLocations()
    {
        $cart = Cart::getCart();

        if (! $cart) {
            return [];
        }

        if ($cart->haveStockableItems()) {

            $storeInventories = [];

            $inventorySources = InventorySource::where('status', true)->get();

            foreach ($inventorySources as $inventorySource) {
                $storeHasAllProducts = true;

                foreach ($cart->items as $item) {
                    // Use the child product (variant) if it's a configurable item
                    $productId = $item->child ? $item->child->product_id : $item->product_id;

                    $productInventory = ProductInventory::where('product_id', $productId)
                        ->where('inventory_source_id', $inventorySource->id)
                        ->where('qty', '>=', $item->quantity)
                        ->exists();

                    if (! $productInventory) {
                        $storeHasAllProducts = false;
                        break;
                    }
                }

                if ($storeHasAllProducts) {
                    $storeInventories[] = [
                        'id'       => $inventorySource->id,
                        'name'     => $inventorySource->name,
                        'street'   => $inventorySource->street,
                        'postcode' => $inventorySource->postcode,
                        'city'     => $inventorySource->city,
                        'state'    => $inventorySource->state,
                        'country'  => $inventorySource->country,
                    ];
                }
            }

            return collect($storeInventories)->sortBy('name')->values()->toArray();
        }

        return [];
    }

    /**
     * Check if shipping method is available.
     *
     * @return bool
     */
    public function isAvailable()
    {
        return (bool) $this->getConfigData('active');
    }
}
