<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'Pickup Information',
                'location' => 'Pickup Location',
                'date'     => 'Pickup Date',
                'time'     => 'Pickup Time',
            ],
        ],
        'system' => [
            'title'                => 'Title',
            'description'          => 'Description',
            'default_rate'         => 'Default Rate',
            'pickup'               => 'Picking up at the store',
            'status'               => 'Status',
            'display_address'      => 'Show the pick-up address in the checkout form',
            'instore_payment_only' => 'Only allow in-store payment for pickup orders',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'Pickup Timeslots',
                'create'           => 'Create',
                'delete'           => 'Delete',
                'edit'             => 'Edit',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'Pickup Timeslots',
                        'add-button'   => 'Add Pickup Timeslot',
                        'no-timeslots' => 'No timeslots have been added yet.',
                        'filter' => [
                            'title'            => 'Filter Timeslots',
                            'clear'            => 'Clear filters',
                            'day'              => 'Day',
                            'all_days'         => 'All Days',
                            'all_inventories'  => 'All Inventories',
                            'inventory_source' => 'Inventory Source',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => 'Inventory Source',
                            'day'                 => 'Day',
                            'weekday'             => 'Weekday',
                            'date'                => 'Pickup Date',
                            'pickup_quota'        => 'Pickup Quota:',
                            'start_time'          => 'Start Time',
                            'end_time'            => 'End Time',
                            'status'              => 'Status',
                            'actions'             => 'Actions',
                            'edit'                => 'Edit',
                            'delete'              => 'Delete',
                            'mass-delete'         => 'Delete',
                            'mass-delete-success' => 'Timeslot deleted successfully.',
                            'mass-delete-error'   => 'Error deleting timeslot.'
                        ],
                    ],
                    'create' => [
                        'title'              => 'Add timeslot',
                        'inventory_source'   => 'Inventory Source',
                        'pickup_day'         => 'Pickup Day',
                        'start_time'         => 'Start Time',
                        'end_time'           => 'End Time',
                        'pickup_quota'       => 'Pickup Quota',
                        'status'             => 'Status',
                        'save-btn'           => 'Save',
                        'success'            => 'Timeslot created successfully.',
                        'duplicate'          => 'Timeslot already exists for the selected day and time.',
                        'error'              => 'Error creating timeslot.',
                    ],
                    'edit' => [
                        'title'              => 'Edit timeslot',
                        'inventory_source'   => 'Inventory Source',
                        'pickup_day'         => 'Pickup Day',
                        'start_time'         => 'Start Time',
                        'end_time'           => 'End Time',
                        'pickup_quota'       => 'Pickup Quota',
                        'status'             => 'Status',
                        'save-btn'           => 'Save',
                        'success'            => 'Timeslot updated successfully.',
                        'error'              => 'Error updating timeslot.',

                    ],
                    'delete-success' => 'Timeslot deleted successfully.',
                    'delete-failed'  => 'Error deleting timeslot.',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'Pickup Options',
                        'pickup_location'     => 'Select a location to collect your order',
                        'pickup_date'         => 'Choose your preferred pickup date',
                        'pickup_time'         => 'Choose a convenient time slot',
                        'no_pickup_locations' => 'Sorry, there are no pickup locations available for the items in your cart.',
                        'no_time_slots'       => 'Sorry, there are no available time slots for the selected location and date.',
                        'details-missing'     => 'Please select a pickup location, date and time.',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => 'Your order is ready for pickup!',
                    'ready_message'     => 'Your order #:order_id, placed on :created_at, is now ready for pickup.',
                    'details'           => 'Pickup Details',
                    'location'          => 'Pickup Location',
                    'selected_timeslot' => 'Your selected timeslot',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => 'Monday',
        2 => 'Tuesday',
        3 => 'Wednesday',
        4 => 'Thursday',
        5 => 'Friday',
        6 => 'Saturday',
        7 => 'Sunday',
    ],
];
