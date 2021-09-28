<?php

return [
    [
        'key' => 'sales.carriers.pickup',
        'name' => 'pickup::app.admin.system.pickup',
        'sort' => 3,
        'fields' => [
          [
            'name'          => 'title',
            'title'         => 'admin::app.admin.system.title',
            'type'          => 'text',
            'validation'    => 'required',
            'channel_based' => true,
            'locale_based'  => true
          ], [
            'name'          => 'description',
            'title'         => 'admin::app.admin.system.description',
            'type'          => 'textarea',
            'channel_based' => true,
            'locale_based'  => false
          ], [
                'name'          => 'active',
                'title'         => 'admin::app.admin.system.status',
                'type'          => 'boolean',
                'validation'    => 'required',
                'channel_based' => false,
                'locale_based'  => true,
            ]
        ]
    ]
];