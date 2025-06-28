<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'Informació de recollida',
                'location' => 'Lloc de recollida',
                'date'     => 'Data de recollida',
                'time'     => 'Hora de recollida',
            ],
        ],
        'system' => [
            'title'                => 'Títol',
            'description'          => 'Descripció',
            'default_rate'         => 'Tarifa per defecte',
            'pickup'               => 'Recollida a la botiga',
            'status'               => 'Estat',
            'display_address'      => 'Mostra l’adreça de recollida al formulari de compra',
            'instore_payment_only' => 'Només permet el pagament a la botiga per comandes amb recollida',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'Franges horàries de recollida',
                'create'           => 'Crear',
                'delete'           => 'Eliminar',
                'edit'             => 'Editar',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'Franges horàries de recollida',
                        'add-button'   => 'Afegir franja horària de recollida',
                        'no-timeslots' => 'Encara no s\'han afegit franges horàries.',
                        'filter'       => [
                            'title'            => 'Filtrar franges horàries',
                            'clear'            => 'Esborrar filtres',
                            'day'              => 'Dia',
                            'all_days'         => 'Tots els dies',
                            'all_inventories'  => 'Totes les ubicacions',
                            'inventory_source' => 'Font d\'inventari',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => 'Font d\'inventari',
                            'day'                 => 'Dia',
                            'weekday'             => 'Dia de la setmana',
                            'date'                => 'Data de recollida',
                            'pickup_quota'        => 'Quota de recollida',
                            'start_time'          => 'Hora d\'inici',
                            'end_time'            => 'Hora de finalització',
                            'status'              => 'Estat',
                            'actions'             => 'Accions',
                            'edit'                => 'Editar',
                            'delete'              => 'Eliminar',
                            'mass-delete'         => 'Eliminar',
                            'mass-delete-success' => 'Franja horària eliminada amb èxit.',
                            'mass-delete-error'   => 'Error en eliminar la franja horària.',
                        ],
                    ],
                    'create' => [
                        'title'              => 'Afegir franja horària',
                        'inventory_source'   => 'Font d\'inventari',
                        'pickup_day'         => 'Dia de recollida',
                        'start_time'         => 'Hora d\'inici',
                        'end_time'           => 'Hora de finalització',
                        'pickup_quota'       => 'Quota de recollida',
                        'status'             => 'Estat',
                        'save-btn'           => 'Desar',
                        'success'            => 'Franja horària creada amb èxit.',
                        'duplicate'          => 'Ja existeix una franja horària per al dia i hora seleccionats.',
                        'error'              => 'Error en crear la franja horària.',
                    ],
                    'edit' => [
                        'title'              => 'Editar franja horària',
                        'inventory_source'   => 'Font d\'inventari',
                        'pickup_day'         => 'Dia de recollida',
                        'start_time'         => 'Hora d\'inici',
                        'end_time'           => 'Hora de finalització',
                        'pickup_quota'       => 'Quota de recollida',
                        'status'             => 'Estat',
                        'save-btn'           => 'Desar',
                        'success'            => 'Franja horària actualitzada amb èxit.',
                        'error'              => 'Error en actualitzar la franja horària.',
                    ],
                    'delete-success' => 'Franja horària eliminada amb èxit.',
                    'delete-failed'  => 'Error en eliminar la franja horària.',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'Opcions de recollida',
                        'pickup_location'     => 'Selecciona un lloc per recollir la teva comanda',
                        'pickup_date'         => 'Tria la teva data preferida de recollida',
                        'pickup_time'         => 'Tria una franja horària convenient',
                        'no_pickup_locations' => 'Ho sentim, no hi ha ubicacions disponibles per a la recollida dels articles del teu carretó.',
                        'no_time_slots'       => 'Ho sentim, no hi ha franges horàries disponibles per a la ubicació i data seleccionades.',
                        'details-missing'     => 'Si us plau, selecciona una ubicació, data i hora de recollida.',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => 'La teva comanda està llesta per recollir!',
                    'ready_message'     => 'La teva comanda #:order_id, realitzada el :created_at, ja està llesta per recollir.',
                    'details'           => 'Detalls de recollida',
                    'location'          => 'Lloc de recollida',
                    'selected_timeslot' => 'La franja horària seleccionada',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => 'Dilluns',
        2 => 'Dimarts',
        3 => 'Dimecres',
        4 => 'Dijous',
        5 => 'Divendres',
        6 => 'Dissabte',
        7 => 'Diumenge',
    ],
];
