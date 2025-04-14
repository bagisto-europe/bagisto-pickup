<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'Informazioni ritiro',
                'location' => 'Posizione ritiro',
                'date'     => 'Data ritiro',
                'time'     => 'Orario ritiro',
            ],
        ],
        'system' => [
            'title'                => 'Titolo',
            'description'          => 'Descrizione',
            'default_rate'         => 'Tariffa predefinita',
            'pickup'               => 'Ritiro in negozio',
            'status'               => 'Stato',
            'display_address'      => 'Mostra l\'indirizzo di ritiro nel modulo di pagamento',
            'instore_payment_only' => 'Consenti solo il pagamento in negozio per gli ordini di ritiro',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'Orari di ritiro',
                'create'           => 'Crea',
                'delete'           => 'Elimina',
                'edit'             => 'Modifica',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'Orari di ritiro',
                        'add-button'   => 'Aggiungi orario di ritiro',
                        'no-timeslots' => 'Nessun orario di ritiro aggiunto finora.',
                        'filter' => [
                            'title'            => 'Filtra orari di ritiro',
                            'clear'            => 'Rimuovi filtri',
                            'day'              => 'Giorno',
                            'all_days'         => 'Tutti i giorni',
                            'all_inventories'  => 'Tutte le sedi',
                            'inventory_source' => 'Fonte inventario',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => 'Fonte inventario',
                            'day'                 => 'Giorno',
                            'weekday'             => 'Giorno della settimana',
                            'date'                => 'Data di ritiro',
                            'pickup_quota'        => 'Quota di ritiro:',
                            'start_time'          => 'Ora di inizio',
                            'end_time'            => 'Ora di fine',
                            'status'              => 'Stato',
                            'actions'             => 'Azioni',
                            'edit'                => 'Modifica',
                            'delete'              => 'Elimina',
                            'mass-delete'         => 'Elimina',
                            'mass-delete-success' => 'Orario di ritiro eliminato con successo.',
                            'mass-delete-error'   => 'Errore nell\'eliminazione dell\'orario di ritiro.',
                        ],
                    ],
                    'create' => [
                        'title'              => 'Aggiungi orario di ritiro',
                        'inventory_source'   => 'Fonte inventario',
                        'pickup_day'         => 'Giorno di ritiro',
                        'start_time'         => 'Ora di inizio',
                        'end_time'           => 'Ora di fine',
                        'pickup_quota'       => 'Quota di ritiro',
                        'status'             => 'Stato',
                        'save-btn'           => 'Salva',
                        'success'            => 'Orario di ritiro aggiunto con successo.',
                        'duplicate'          => 'Orario di ritiro già esistente per il giorno e l\'ora selezionati.',
                        'error'              => 'Errore nell\'aggiunta dell\'orario di ritiro.',
                    ],
                    'edit' => [
                        'title'              => 'Modifica orario di ritiro',
                        'inventory_source'   => 'Fonte inventario',
                        'pickup_day'         => 'Giorno di ritiro',
                        'start_time'         => 'Ora di inizio',
                        'end_time'           => 'Ora di fine',
                        'pickup_quota'       => 'Quota di ritiro',
                        'status'             => 'Stato',
                        'save-btn'           => 'Salva',
                        'success'            => 'Orario di ritiro aggiornato con successo.',
                        'error'              => 'Errore nell\'aggiornamento dell\'orario di ritiro.',
                    ],
                    'delete-success' => 'Orario di ritiro eliminato con successo.',
                    'delete-failed'  => 'Errore nell\'eliminazione dell\'orario di ritiro.',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'Opzioni di ritiro',
                        'pickup_location'     => 'Seleziona un luogo per ritirare il tuo ordine',
                        'pickup_date'         => 'Scegli la data di ritiro preferita',
                        'pickup_time'         => 'Scegli l\'orario di ritiro comodo',
                        'no_pickup_locations' => 'Siamo spiacenti, non ci sono luoghi di ritiro disponibili per gli articoli nel tuo carrello.',
                        'no_time_slots'       => 'Siamo spiacenti, non ci sono orari disponibili per la posizione e la data selezionate.',
                        'details-missing'     => 'Si prega di selezionare un luogo di ritiro, una data e un orario.',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => 'Il tuo ordine è pronto per il ritiro!',
                    'ready_message'     => 'Il tuo ordine #:order_id, effettuato il :created_at, è ora pronto per il ritiro.',
                    'details'           => 'Dettagli ritiro',
                    'location'          => 'Posizione di ritiro',
                    'selected_timeslot' => 'Il tuo orario di ritiro selezionato',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => 'Lunedì',
        2 => 'Martedì',
        3 => 'Mercoledì',
        4 => 'Giovedì',
        5 => 'Venerdì',
        6 => 'Sabato',
        7 => 'Domenica',
    ],
];
