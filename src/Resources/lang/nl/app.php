<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'Ophalen informatie',
                'location' => 'Ophaallocatie',
                'date'     => 'Ophaaldatum',
                'time'     => 'Ophaaltijd',
            ],
        ],
        'system' => [
            'title'                => 'Titel',
            'description'          => 'Beschrijving',
            'default_rate'         => 'Standaardtarief',
            'pickup'               => 'Ophalen in de winkel',
            'status'               => 'Status',
            'display_address'      => 'Toon ophaaladres in de checkout',
            'instore_payment_only' => 'Sta alleen betaling in de winkel toe voor ophaalbestellingen',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'Ophaaltijdslots',
                'create'           => 'Maak',
                'delete'           => 'Verwijder',
                'edit'             => 'Bewerk',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'Ophaaltijdslots',
                        'add-button'   => 'Voeg ophaaltijdslot toe',
                        'no-timeslots' => 'Er zijn nog geen ophaaltijdslots toegevoegd.',
                        'filter'       => [
                            'title'            => 'Filter ophaaltijdslots',
                            'clear'            => 'Wis filters',
                            'day'              => 'Dag',
                            'all_days'         => 'Alle dagen',
                            'all_inventories'  => 'Alle locaties',
                            'inventory_source' => 'Inventarisbron',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => 'Inventarisbron',
                            'day'                 => 'Dag',
                            'weekday'             => 'Wekdag',
                            'date'                => 'Ophaaldatum',
                            'pickup_quota'        => 'Afhaallimiet',
                            'start_time'          => 'Starttijd',
                            'end_time'            => 'Eindtijd',
                            'status'              => 'Status',
                            'actions'             => 'Acties',
                            'edit'                => 'Bewerk',
                            'delete'              => 'Verwijder',
                            'mass-delete'         => 'Verwijder',
                            'mass-delete-success' => 'Ophaaltijdslot succesvol verwijderd.',
                            'mass-delete-error'   => 'Fout bij het verwijderen van ophaaltijdslot.',
                        ],
                    ],
                    'create' => [
                        'title'              => 'Voeg ophaaltijdslot toe',
                        'inventory_source'   => 'Inventarisbron',
                        'pickup_day'         => 'Ophaaldag',
                        'start_time'         => 'Starttijd',
                        'end_time'           => 'Eindtijd',
                        'pickup_quota'       => 'Afhaallimiet',
                        'status'             => 'Status',
                        'save-btn'           => 'Opslaan',
                        'success'            => 'Ophaaltijdslot succesvol toegevoegd.',
                        'duplicate'          => 'Er is al een ophaaltijdslot voor de geselecteerde dag en tijd.',
                        'error'              => 'Fout bij het toevoegen van ophaaltijdslot.',
                    ],
                    'edit' => [
                        'title'              => 'Bewerk ophaaltijdslot',
                        'inventory_source'   => 'Inventarisbron',
                        'pickup_day'         => 'Ophaaldag',
                        'start_time'         => 'Starttijd',
                        'end_time'           => 'Eindtijd',
                        'pickup_quota'       => 'Afhaallimiet',
                        'status'             => 'Status',
                        'save-btn'           => 'Opslaan',
                        'success'            => 'Tijdslot succesvol bijgewerkt.',
                        'error'              => 'Fout bij het bijwerken van het tijdslot.',
                    ],
                    'delete-success' => 'Tijdslot succesvol verwijderd.',
                    'delete-failed'  => 'Fout bij het verwijderen van tijdslot.',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'Ophalen opties',
                        'pickup_location'     => 'Selecteer een locatie om je bestelling op te halen',
                        'pickup_date'         => 'Kies je gewenste ophaaldatum',
                        'pickup_time'         => 'Kies een handige ophaaltijd',
                        'no_pickup_locations' => 'Sorry, er zijn geen ophaallocaties beschikbaar voor de artikelen in je winkelwagentje.',
                        'no_time_slots'       => 'Sorry, er zijn geen tijdslots beschikbaar voor de geselecteerde locatie en datum.',
                        'details-missing'     => 'Selecteer een ophaallocatie, datum en tijd.',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => 'Je bestelling is klaar om op te halen!',
                    'ready_message'     => 'Je bestelling #:order_id, geplaatst op :created_at, is klaar voor ophalen.',
                    'details'           => 'Ophaalinformatie',
                    'location'          => 'Ophaallocatie',
                    'selected_timeslot' => 'Je geselecteerde ophaaltijd',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => 'Maandag',
        2 => 'Dinsdag',
        3 => 'Woensdag',
        4 => 'Donderdag',
        5 => 'Vrijdag',
        6 => 'Zaterdag',
        7 => 'Zondag',
    ],
];
