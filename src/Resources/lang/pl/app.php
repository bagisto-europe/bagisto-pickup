<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'Informacje o odbiorze',
                'location' => 'Lokalizacja odbioru',
                'date'     => 'Data odbioru',
                'time'     => 'Czas odbioru',
            ],
        ],
        'system' => [
            'title'                => 'Tytuł',
            'description'          => 'Opis',
            'default_rate'         => 'Domyślna stawka',
            'pickup'               => 'Odbiór osobisty',
            'status'               => 'Status',
            'display_address'      => 'Pokaż adres odbioru w formularzu zamówienia',
            'instore_payment_only' => 'Zezwól tylko na płatność w sklepie dla zamówień odbioru osobistego',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'Godziny odbioru',
                'create'           => 'Utwórz',
                'delete'           => 'Usuń',
                'edit'             => 'Edytuj',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'Godziny odbioru',
                        'add-button'   => 'Dodaj godzinę odbioru',
                        'no-timeslots' => 'Nie dodano jeszcze żadnych godzin odbioru.',
                        'filter'       => [
                            'title'            => 'Filtruj godziny odbioru',
                            'clear'            => 'Wyczyść filtry',
                            'day'              => 'Dzień',
                            'all_days'         => 'Wszystkie dni',
                            'all_inventories'  => 'Wszystkie lokalizacje',
                            'inventory_source' => 'Źródło zapasów',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => 'Źródło zapasów',
                            'day'                 => 'Dzień',
                            'weekday'             => 'Dzień tygodnia',
                            'date'                => 'Data odbioru',
                            'pickup_quota'        => 'Limit odbioru',
                            'start_time'          => 'Godzina rozpoczęcia',
                            'end_time'            => 'Godzina zakończenia',
                            'status'              => 'Status',
                            'actions'             => 'Akcje',
                            'edit'                => 'Edytuj',
                            'delete'              => 'Usuń',
                            'mass-delete'         => 'Usuń',
                            'mass-delete-success' => 'Godzina odbioru została pomyślnie usunięta.',
                            'mass-delete-error'   => 'Błąd podczas usuwania godziny odbioru.',
                        ],
                    ],
                    'create' => [
                        'title'              => 'Dodaj godzinę odbioru',
                        'inventory_source'   => 'Źródło zapasów',
                        'pickup_day'         => 'Dzień odbioru',
                        'start_time'         => 'Godzina rozpoczęcia',
                        'end_time'           => 'Godzina zakończenia',
                        'pickup_quota'       => 'Limit odbioru',
                        'status'             => 'Status',
                        'save-btn'           => 'Zapisz',
                        'success'            => 'Godzina odbioru została pomyślnie dodana.',
                        'duplicate'          => 'Godzina odbioru już istnieje dla wybranego dnia i godziny.',
                        'error'              => 'Błąd podczas dodawania godziny odbioru.',
                    ],
                    'edit' => [
                        'title'              => 'Edytuj godzinę odbioru',
                        'inventory_source'   => 'Źródło zapasów',
                        'pickup_day'         => 'Dzień odbioru',
                        'start_time'         => 'Godzina rozpoczęcia',
                        'end_time'           => 'Godzina zakończenia',
                        'pickup_quota'       => 'Limit odbioru',
                        'status'             => 'Status',
                        'save-btn'           => 'Zapisz',
                        'success'            => 'Godzina odbioru została pomyślnie zaktualizowana.',
                        'error'              => 'Błąd podczas aktualizacji godziny odbioru.',
                    ],
                    'delete-success' => 'Godzina odbioru została pomyślnie usunięta.',
                    'delete-failed'  => 'Błąd podczas usuwania godziny odbioru.',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'Opcje odbioru',
                        'pickup_location'     => 'Wybierz miejsce odbioru zamówienia',
                        'pickup_date'         => 'Wybierz preferowaną datę odbioru',
                        'pickup_time'         => 'Wybierz dogodną godzinę odbioru',
                        'no_pickup_locations' => 'Przepraszamy, nie ma dostępnych miejsc odbioru dla produktów w Twoim koszyku.',
                        'no_time_slots'       => 'Przepraszamy, brak dostępnych godzin odbioru dla wybranej lokalizacji i daty.',
                        'details-missing'     => 'Proszę wybrać miejsce odbioru, datę i godzinę.',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => 'Twoje zamówienie jest gotowe do odbioru!',
                    'ready_message'     => 'Twoje zamówienie #:order_id, złożone :created_at, jest teraz gotowe do odbioru.',
                    'details'           => 'Szczegóły odbioru',
                    'location'          => 'Miejsce odbioru',
                    'selected_timeslot' => 'Wybrana godzina odbioru',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => 'Poniedziałek',
        2 => 'Wtorek',
        3 => 'Środa',
        4 => 'Czwartek',
        5 => 'Piątek',
        6 => 'Sobota',
        7 => 'Niedziela',
    ],
];
