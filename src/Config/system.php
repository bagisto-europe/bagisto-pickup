<?php

return [
    [
        'key'    => 'sales.carriers.pickup',
        'name'   => 'pickup::app.admin.system.pickup',
        'info'   => 'Pickup Shipping Method settings',
        'sort'   => 3,
        'fields' => [
            [
                'name'          => 'title',
                'title'         => 'pickup::app.admin.system.title',
                'type'          => 'text',
                'default_value' => 'Pickup',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => true,
            ], [
                'name'          => 'description',
                'title'         => 'pickup::app.admin.system.description',
                'type'          => 'textarea',
                'channel_based' => true,
                'locale_based'  => true,
            ],
            [
                'name'          => 'active',
                'title'         => 'pickup::app.admin.system.status',
                'type'          => 'boolean',
                'default_value' => false,
                'channel_based' => true,
                'locale_based'  => false,
            ],
            [
                'name'          => 'default_rate',
                'title'         => 'pickup::app.admin.system.default_rate',
                'type'          => 'text',
                'default_value' => 0,
                'channel_based' => true,
                'locale_based'  => false,
            ],
            [
                'name'          => 'only_instore_payment',
                'title'         => 'pickup::app.admin.system.instore_payment_only',
                'type'          => 'boolean',
                'default_value' => false,
                'channel_based' => true,
                'locale_based'  => false,
            ],
        ],
    ],
    [
        'key'    => 'sales.payment_methods.instore',
        'name'   => 'Instore Payment',
        'info'   => 'Instore Payment settings',
        'sort'   => 5,
        'fields' => [
            [
                'name'          => 'title',
                'title'         => 'pickup::app.admin.system.title',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => false,
                'locale_based'  => true,
            ], [
                'name'          => 'description',
                'title'         => 'pickup::app.admin.system.description',
                'type'          => 'textarea',
                'channel_based' => false,
                'locale_based'  => true,
            ], [
                'name'          => 'active',
                'title'         => 'pickup::app.admin.system.status',
                'type'          => 'boolean',
                'default_value' => true,
                'channel_based' => false,
                'locale_based'  => true,
            ],
        ],
    ],
];
