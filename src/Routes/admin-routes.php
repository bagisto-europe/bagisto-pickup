<?php

use Bagisto\Pickup\Http\Controllers\Admin\TimeSlotsController;

Route::group(['middleware' => ['web', 'admin'], 'prefix' => config('app.admin_url')], function () {

    Route::prefix('settings')->group(function () {

        Route::controller(TimeSlotsController::class)->prefix('pickup')->group(function () {
            Route::get('', 'index')->name('admin.settings.pickup.timeslot.index');

            Route::get('create', 'store')->name('admin.settings.pickup.timeslot.create');

            Route::post('create', 'store')->name('admin.settings.pickup.timeslot.store');

            Route::get('edit/{id}', 'edit')->name('admin.settings.pickup.timeslot.edit');

            Route::post('update', 'update')->name('admin.settings.pickup.timeslot.update');

            Route::post('delete', 'destroy')->name('admin.settings.pickup.timeslot.delete');

            Route::post('bulkdelete', 'bulkDestroy')->name('admin.settings.pickup.timeslot.bulk-delete');
        });

    });
});
