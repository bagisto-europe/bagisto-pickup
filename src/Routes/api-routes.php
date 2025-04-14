<?php

use Bagisto\Pickup\Http\Controllers\Shop\API\OnepageController;

Route::prefix('api')->middleware(['web'])->group(function () {

    Route::prefix('checkout/onepage/pickup')->group(function () {
        Route::get('locations', [OnepageController::class, 'getPickupLocations'])->name('checkout.pickup.locations');

        Route::post('save-location', [OnepageController::class, 'storePickup'])->name('checkout.pickup.saveLocation');

        Route::post('save-cart', [OnepageController::class, 'storePickup'])->name('checkout.pickup.store');

        Route::get('timeslots', [OnepageController::class, 'getAvailableTimeslots'])->name('checkout.pickup.timeslots');
    });

});
