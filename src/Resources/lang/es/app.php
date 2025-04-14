<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'Información de recogida',
                'location' => 'Ubicación de recogida',
                'date'     => 'Fecha de recogida',
                'time'     => 'Hora de recogida',
            ],
        ],
        'system' => [
            'title'                => 'Título',
            'description'          => 'Descripción',
            'default_rate'         => 'Tarifa predeterminada',
            'pickup'               => 'Recogiendo en la tienda',
            'status'               => 'Estado',
            'display_address'      => 'Mostrar la dirección de recogida en el formulario de pago',
            'instore_payment_only' => 'Solo permitir pago en tienda para pedidos de recogida',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'Franjass horarias de recogida',
                'create'           => 'Crear',
                'delete'           => 'Eliminar',
                'edit'             => 'Editar',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'Franjass horarias de recogida',
                        'add-button'   => 'Agregar franja horaria de recogida',
                        'no-timeslots' => 'Aún no se han agregado franjas horarias.',
                        'filter' => [
                            'title'            => 'Filtrar franjas horarias',
                            'clear'            => 'Limpiar filtros',
                            'day'              => 'Día',
                            'all_days'         => 'Todos los días',
                            'all_inventories'  => 'Todas las ubicaciones',
                            'inventory_source' => 'Fuente de inventario',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => 'Fuente de inventario',
                            'day'                 => 'Día',
                            'weekday'             => 'Día de la semana',
                            'date'                => 'Fecha de recogida',
                            'pickup_quota'        => 'Cuota de recogida:',
                            'start_time'          => 'Hora de inicio',
                            'end_time'            => 'Hora de fin',
                            'status'              => 'Estado',
                            'actions'             => 'Acciones',
                            'edit'                => 'Editar',
                            'delete'              => 'Eliminar',
                            'mass-delete'         => 'Eliminar',
                            'mass-delete-success' => 'Franja horaria eliminada con éxito.',
                            'mass-delete-error'   => 'Error al eliminar la franja horaria.',
                        ],
                    ],
                    'create' => [
                        'title'              => 'Agregar franja horaria',
                        'inventory_source'   => 'Fuente de inventario',
                        'pickup_day'         => 'Día de recogida',
                        'start_time'         => 'Hora de inicio',
                        'end_time'           => 'Hora de fin',
                        'pickup_quota'       => 'Cuota de recogida',
                        'status'             => 'Estado',
                        'save-btn'           => 'Guardar',
                        'success'            => 'Franja horaria creada con éxito.',
                        'duplicate'          => 'Ya existe una franja horaria para el día y la hora seleccionados.',
                        'error'              => 'Error al crear la franja horaria.',
                    ],
                    'edit' => [
                        'title'              => 'Editar franja horaria',
                        'inventory_source'   => 'Fuente de inventario',
                        'pickup_day'         => 'Día de recogida',
                        'start_time'         => 'Hora de inicio',
                        'end_time'           => 'Hora de fin',
                        'pickup_quota'       => 'Cuota de recogida',
                        'status'             => 'Estado',
                        'save-btn'           => 'Guardar',
                        'success'            => 'Franja horaria actualizada con éxito.',
                        'error'              => 'Error al actualizar la franja horaria.',
                    ],
                    'delete-success' => 'Franja horaria eliminada con éxito.',
                    'delete-failed'  => 'Error al eliminar la franja horaria.',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'Opciones de recogida',
                        'pickup_location'     => 'Selecciona una ubicación para recoger tu pedido',
                        'pickup_date'         => 'Elige tu fecha de recogida preferida',
                        'pickup_time'         => 'Elige una franja horaria conveniente',
                        'no_pickup_locations' => 'Lo sentimos, no hay ubicaciones de recogida disponibles para los artículos en tu carrito.',
                        'no_time_slots'       => 'Lo sentimos, no hay franjas horarias disponibles para la ubicación y la fecha seleccionadas.',
                        'details-missing'     => 'Por favor, selecciona una ubicación, fecha y hora de recogida.',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => '¡Tu pedido está listo para ser recogido!',
                    'ready_message'     => 'Tu pedido #:order_id, realizado el :created_at, ya está listo para recogerse.',
                    'details'           => 'Detalles de recogida',
                    'location'          => 'Ubicación de recogida',
                    'selected_timeslot' => 'Tu franja horaria seleccionada',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => 'Lunes',
        2 => 'Martes',
        3 => 'Miércoles',
        4 => 'Jueves',
        5 => 'Viernes',
        6 => 'Sábado',
        7 => 'Domingo',
    ],
];
