<?php

namespace Bagisto\Pickup\Models;

use Bagisto\Pickup\Contracts\PickupOrder as PickupOrderContract;
use Illuminate\Database\Eloquent\Model;
use Webkul\Inventory\Models\InventorySource;
use Webkul\Sales\Models\Order;

class PickupOrder extends Model implements PickupOrderContract
{
    protected $table = 'pickup_orders';

    protected $fillable = [
        'order_id',
        'customer_id',
        'inventory_source_id',
        'timeslot_id',
        'pickup_date',
        'start_time',
        'end_time',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function inventory()
    {
        return $this->belongsTo(InventorySource::class, 'inventory_source_id');
    }

    public function timeslot()
    {
        return $this->belongsTo(PickupTimeslot::class, 'timeslot_id');
    }
}
