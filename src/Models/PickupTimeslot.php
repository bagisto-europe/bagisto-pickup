<?php

namespace Bagisto\Pickup\Models;

use Bagisto\Pickup\Contracts\PickupTimeslot as PickupTimeslotContract;
use Illuminate\Database\Eloquent\Model;
use Webkul\Inventory\Models\InventorySource;

class PickupTimeslot extends Model implements PickupTimeslotContract
{
    protected $table = 'pickup_timeslots';

    protected $fillable = [
        'inventory_source_id',
        'pickup_day',
        'pickup_date',
        'pickup_quota',
        'start_time',
        'end_time',
    ];

    public function inventory()
    {
        return $this->belongsTo(InventorySource::class, 'inventory_source_id');
    }
}
