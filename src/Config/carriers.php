<?php

return [
    'pickup' => [
        'code'        => 'pickup',
        'title'       => 'Store Pickup',
        'description' => 'Pickup your order from the store',
        'active'      => true,
        'type'        => 'per_order',
        'class'       => 'Bagisto\Pickup\Carriers\Pickup',
    ],
];
