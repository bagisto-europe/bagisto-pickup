<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'Informations de retrait',
                'location' => 'Lieu de retrait',
                'date'     => 'Date de retrait',
                'time'     => 'Heure de retrait',
            ],
        ],
        'system' => [
            'title'                => 'Titre',
            'description'          => 'Description',
            'default_rate'         => 'Tarif par défaut',
            'pickup'               => 'Retrait en magasin',
            'status'               => 'Statut',
            'display_address'      => 'Afficher l’adresse de retrait dans le formulaire de commande',
            'instore_payment_only' => 'Autoriser uniquement le paiement en magasin pour les commandes de retrait',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'Plages horaires de retrait',
                'create'           => 'Créer',
                'delete'           => 'Supprimer',
                'edit'             => 'Modifier',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'Plages horaires de retrait',
                        'add-button'   => 'Ajouter une plage horaire de retrait',
                        'no-timeslots' => 'Aucune plage horaire n\'a été ajoutée pour le moment.',
                        'filter' => [
                            'title'            => 'Filtrer les plages horaires',
                            'clear'            => 'Effacer les filtres',
                            'day'              => 'Jour',
                            'all_days'         => 'Tous les jours',
                            'all_inventories'  => 'Tous les emplacements',
                            'inventory_source' => 'Source d\'inventaire',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => 'Source d\'inventaire',
                            'day'                 => 'Jour',
                            'weekday'             => 'Jour de la semaine',
                            'date'                => 'Date de retrait',
                            'pickup_quota'        => 'Quota de retrait :',
                            'start_time'          => 'Heure de début',
                            'end_time'            => 'Heure de fin',
                            'status'              => 'Statut',
                            'actions'             => 'Actions',
                            'edit'                => 'Modifier',
                            'delete'              => 'Supprimer',
                            'mass-delete'         => 'Supprimer',
                            'mass-delete-success' => 'Plage horaire supprimée avec succès.',
                            'mass-delete-error'   => 'Erreur lors de la suppression de la plage horaire.',
                        ],
                    ],
                    'create' => [
                        'title'              => 'Ajouter une plage horaire',
                        'inventory_source'   => 'Source d\'inventaire',
                        'pickup_day'         => 'Jour de retrait',
                        'start_time'         => 'Heure de début',
                        'end_time'           => 'Heure de fin',
                        'pickup_quota'       => 'Quota de retrait',
                        'status'             => 'Statut',
                        'save-btn'           => 'Enregistrer',
                        'success'            => 'Plage horaire créée avec succès.',
                        'duplicate'          => 'La plage horaire existe déjà pour le jour et l\'heure sélectionnés.',
                        'error'              => 'Erreur lors de la création de la plage horaire.',
                    ],
                    'edit' => [
                        'title'              => 'Modifier la plage horaire',
                        'inventory_source'   => 'Source d\'inventaire',
                        'pickup_day'         => 'Jour de retrait',
                        'start_time'         => 'Heure de début',
                        'end_time'           => 'Heure de fin',
                        'pickup_quota'       => 'Quota de retrait',
                        'status'             => 'Statut',
                        'save-btn'           => 'Enregistrer',
                        'success'            => 'Plage horaire mise à jour avec succès.',
                        'error'              => 'Erreur lors de la mise à jour de la plage horaire.',
                    ],
                    'delete-success' => 'Plage horaire supprimée avec succès.',
                    'delete-failed'  => 'Erreur lors de la suppression de la plage horaire.',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'Options de retrait',
                        'pickup_location'     => 'Sélectionnez un lieu pour retirer votre commande',
                        'pickup_date'         => 'Choisissez votre date de retrait préférée',
                        'pickup_time'         => 'Choisissez une plage horaire convenable',
                        'no_pickup_locations' => 'Désolé, il n\'y a pas de lieux de retrait disponibles pour les articles dans votre panier.',
                        'no_time_slots'       => 'Désolé, il n\'y a pas de plages horaires disponibles pour le lieu et la date sélectionnés.',
                        'details-missing'     => 'Veuillez sélectionner un lieu, une date et une heure de retrait.',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => 'Votre commande est prête à être retirée !',
                    'ready_message'     => 'Votre commande #:order_id, passée le :created_at, est maintenant prête à être retirée.',
                    'details'           => 'Détails du retrait',
                    'location'          => 'Lieu de retrait',
                    'selected_timeslot' => 'Votre plage horaire sélectionnée',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => 'Lundi',
        2 => 'Mardi',
        3 => 'Mercredi',
        4 => 'Jeudi',
        5 => 'Vendredi',
        6 => 'Samedi',
        7 => 'Dimanche',
    ],
];
