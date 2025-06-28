<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'Abholinformationen',
                'location' => 'Abholort',
                'date'     => 'Abholdatum',
                'time'     => 'Abholzeit',
            ],
        ],
        'system' => [
            'title'                => 'Titel',
            'description'          => 'Beschreibung',
            'default_rate'         => 'Standardrate',
            'pickup'               => 'Abholung im Laden',
            'status'               => 'Status',
            'display_address'      => 'Zeige die Abholadresse im Checkout-Formular an',
            'instore_payment_only' => 'Nur Ladenzahlung für Abholbestellungen zulassen',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'Abholzeiten',
                'create'           => 'Erstellen',
                'delete'           => 'Löschen',
                'edit'             => 'Bearbeiten',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'Abholzeiten',
                        'add-button'   => 'Abholzeit hinzufügen',
                        'no-timeslots' => 'Es wurden noch keine Abholzeiten hinzugefügt.',
                        'filter'       => [
                            'title'            => 'Abholzeiten filtern',
                            'clear'            => 'Filter löschen',
                            'day'              => 'Tag',
                            'all_days'         => 'Alle Tage',
                            'all_inventories'  => 'Alle Standorte',
                            'inventory_source' => 'Bestandsquelle',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => 'Bestandsquelle',
                            'day'                 => 'Tag',
                            'weekday'             => 'Wochentag',
                            'date'                => 'Abholdatum',
                            'pickup_quota'        => 'Abholquote',
                            'start_time'          => 'Startzeit',
                            'end_time'            => 'Endzeit',
                            'status'              => 'Status',
                            'actions'             => 'Aktionen',
                            'edit'                => 'Bearbeiten',
                            'delete'              => 'Löschen',
                            'mass-delete'         => 'Löschen',
                            'mass-delete-success' => 'Abholzeit erfolgreich gelöscht.',
                            'mass-delete-error'   => 'Fehler beim Löschen der Abholzeit.',
                        ],
                    ],
                    'create' => [
                        'title'              => 'Abholzeit hinzufügen',
                        'inventory_source'   => 'Bestandsquelle',
                        'pickup_day'         => 'Abholdatum',
                        'start_time'         => 'Startzeit',
                        'end_time'           => 'Endzeit',
                        'pickup_quota'       => 'Abholquote',
                        'status'             => 'Status',
                        'save-btn'           => 'Speichern',
                        'success'            => 'Abholzeit erfolgreich erstellt.',
                        'duplicate'          => 'Abholzeit existiert bereits für den ausgewählten Tag und die Uhrzeit.',
                        'error'              => 'Fehler beim Erstellen der Abholzeit.',
                    ],
                    'edit' => [
                        'title'              => 'Abholzeit bearbeiten',
                        'inventory_source'   => 'Bestandsquelle',
                        'pickup_day'         => 'Abholdatum',
                        'start_time'         => 'Startzeit',
                        'end_time'           => 'Endzeit',
                        'pickup_quota'       => 'Abholquote',
                        'status'             => 'Status',
                        'save-btn'           => 'Speichern',
                        'success'            => 'Abholzeit erfolgreich aktualisiert.',
                        'error'              => 'Fehler beim Aktualisieren der Abholzeit.',
                    ],
                    'delete-success' => 'Abholzeit erfolgreich gelöscht.',
                    'delete-failed'  => 'Fehler beim Löschen der Abholzeit.',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'Abholoptionen',
                        'pickup_location'     => 'Wählen Sie einen Ort zur Abholung Ihrer Bestellung',
                        'pickup_date'         => 'Wählen Sie Ihr bevorzugtes Abholdatum',
                        'pickup_time'         => 'Wählen Sie ein passendes Zeitfenster',
                        'no_pickup_locations' => 'Entschuldigung, es sind keine Abholorte für die Artikel in Ihrem Warenkorb verfügbar.',
                        'no_time_slots'       => 'Entschuldigung, es sind keine verfügbaren Zeitfenster für den ausgewählten Ort und das Datum verfügbar.',
                        'details-missing'     => 'Bitte wählen Sie einen Abholort, ein Datum und eine Uhrzeit.',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => 'Ihre Bestellung ist zur Abholung bereit!',
                    'ready_message'     => 'Ihre Bestellung #:order_id, die am :created_at aufgegeben wurde, ist nun zur Abholung bereit.',
                    'details'           => 'Abholdetails',
                    'location'          => 'Abholort',
                    'selected_timeslot' => 'Ihr gewähltes Zeitfenster',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => 'Montag',
        2 => 'Dienstag',
        3 => 'Mittwoch',
        4 => 'Donnerstag',
        5 => 'Freitag',
        6 => 'Samstag',
        7 => 'Sonntag',
    ],
];
