<?php

namespace Bagisto\Pickup\Http\Controllers\Shop\API;

use Bagisto\Pickup\Carriers\Pickup;
use Bagisto\Pickup\Models\PickupOrder;
use Bagisto\Pickup\Models\PickupTimeslot;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Webkul\Checkout\Facades\Cart;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Shop\Http\Controllers\API\OnepageController as BaseOnepageController;

class OnepageController extends BaseOnepageController
{
    public function __construct(
        OrderRepository $orderRepository,
        CustomerRepository $customerRepository,
        Pickup $pickup
    ) {
        $this->orderRepository = $orderRepository;
        $this->customerRepository = $customerRepository;

        $this->pickup = $pickup;

        parent::__construct($orderRepository, $customerRepository);
    }

    /**
     * Get available store locations based on cart items.
     */
    public function getPickupLocations(): JsonResponse
    {
        try {
            $locations = cache()->remember('pickup_locations', 1 * 60, function () {
                return $this->pickup->getAvailableLocations();
            });

            return response()->json(['locations' => $locations]);

        } catch (\Exception $e) {
            \Log::error('Error fetching pickup locations: '.$e->getMessage());

            return response()->json(['error' => 'Unable to fetch pickup locations.'], 500);
        }
    }

    public function getAvailableTimeslots(Request $request): JsonResponse
    {
        // Convert pickup date to day of week (1 = Monday, 7 = Sunday)
        $dayOfWeek = Carbon::parse($pickupDate)->dayOfWeekIso;
        
        $pickupLocationId = $request->input('pickup_location');
        $pickupDate = $request->input('pickup_date');

        $timeslots = PickupTimeslot::where('inventory_source_id', $pickupLocationId)
            ->where('pickup_day', $dayOfWeek)
            ->orderBy('start_time')
            ->get()
            ->map(function ($slot) use ($pickupDate) {
                $orderCount = PickupOrder::where('inventory_source_id', $slot->inventory_source_id)
                    ->where('pickup_date', $pickupDate)
                    ->where('timeslot_id', $slot->id)
                    ->count();

                $isAvailable = ($orderCount < $slot->pickup_quota);

                return [
                    'id'              => $slot->id,
                    'pickup_location' => $slot->inventory_source_id,
                    'pickup_date'     => $pickupDate,
                    'start_time'      => $slot->start_time,
                    'end_time'        => $slot->end_time,
                    'is_available'    => $isAvailable,
                    'available_slots' => $slot->pickup_quota - $orderCount,
                ];
            })
            ->filter(function ($slot) {
                return $slot['is_available'];
            });

        return response()->json($timeslots->values()->toArray());
    }

    /**
     * Store selected pickup details in the cart.
     */
    public function storePickup(Request $request): JsonResponse
    {
        $data = $request->validate([
            'pickup_location' => 'required|integer|exists:inventory_sources,id',
            'pickup_date'     => 'required|date',
            'pickup_time'     => 'required|integer|exists:pickup_timeslots,id',
        ]);

        $cart = Cart::getCart();

        if ($cart?->shipping_method === 'pickup') {
            foreach ($cart->items as $cartItem) {
                $cartItem->update([
                    'additional' => array_merge(
                        $cartItem->additional ?? [],
                        [
                            'pickup' => [
                                'location' => $data['pickup_location'],
                                'date'     => $data['pickup_date'],
                                'timeslot' => $data['pickup_time'],
                            ],
                        ]
                    ),
                ]);
            }
        }

        return response()->json([
            'message'         => 'Pickup details stored successfully.',
            'pickup_location' => $data['pickup_location'],
            'pickup_date'     => $data['pickup_date'],
            'pickup_timeslot' => $data['pickup_time'],
        ])->setStatusCode(200);
    }

    /**
     * Override storeOrder method to include Pickup validation
     */
    public function storeOrder()
    {

        if (Cart::getCart()->shipping_method === 'pickup') {
            $this->validatePickupDetails();
        }

        // Call the parent storeOrder method to proceed with the order creation
        return parent::storeOrder();
    }

    /**
     * Check if the pickup details are saved in the cart
     */
    private function validatePickupDetails()
    {
        $cart = Cart::getCart();

        foreach ($cart->items as $cartItem) {
            $pickupDetails = $cartItem->additional['pickup'] ?? null;

            if (! $pickupDetails) {
                throw new \Exception(trans('pickup::app.shop.checkout.onepage.shipping.pickup.details-missing'));
            }

            $pickupLocation = $pickupDetails['location'] ?? null;
            $pickupDate = $pickupDetails['date'] ?? null;
            $pickupTime = $pickupDetails['timeslot'] ?? null;

            if (! $pickupLocation) {
                throw new \Exception(trans('shop::app.checkout.cart.pickup-location-required'));
            }

            if (! $pickupDate) {
                throw new \Exception(trans('shop::app.checkout.cart.pickup-date-required'));
            }

            if (! $pickupTime) {
                throw new \Exception(trans('shop::app.checkout.cart.pickup-time-required'));
            }
        }
    }
}
