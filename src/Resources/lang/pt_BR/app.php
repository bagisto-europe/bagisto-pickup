<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'Informações de Retirada',
                'location' => 'Local de Retirada',
                'date'     => 'Data de Retirada',
                'time'     => 'Hora de Retirada',
            ],
        ],
        'system' => [
            'title'                => 'Título',
            'description'          => 'Descrição',
            'default_rate'         => 'Taxa Padrão',
            'pickup'               => 'Retirada na Loja',
            'status'               => 'Status',
            'display_address'      => 'Mostrar endereço de retirada no formulário de checkout',
            'instore_payment_only' => 'Permitir pagamento apenas na loja para pedidos de retirada',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'Horários de Retirada',
                'create'           => 'Criar',
                'delete'           => 'Excluir',
                'edit'             => 'Editar',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'Horários de Retirada',
                        'add-button'   => 'Adicionar Horário de Retirada',
                        'no-timeslots' => 'Ainda não foram adicionados horários de retirada.',
                        'filter'       => [
                            'title'            => 'Filtrar Horários de Retirada',
                            'clear'            => 'Limpar filtros',
                            'day'              => 'Dia',
                            'all_days'         => 'Todos os dias',
                            'all_inventories'  => 'Todos os locais',
                            'inventory_source' => 'Fonte de Inventário',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => 'Fonte de Inventário',
                            'day'                 => 'Dia',
                            'weekday'             => 'Dia da Semana',
                            'date'                => 'Data de Retirada',
                            'pickup_quota'        => 'Cota de Retirada',
                            'start_time'          => 'Hora de Início',
                            'end_time'            => 'Hora de Fim',
                            'status'              => 'Status',
                            'actions'             => 'Ações',
                            'edit'                => 'Editar',
                            'delete'              => 'Excluir',
                            'mass-delete'         => 'Excluir',
                            'mass-delete-success' => 'Horário de retirada excluído com sucesso.',
                            'mass-delete-error'   => 'Erro ao excluir horário de retirada.',
                        ],
                    ],
                    'create' => [
                        'title'              => 'Adicionar Horário de Retirada',
                        'inventory_source'   => 'Fonte de Inventário',
                        'pickup_day'         => 'Dia de Retirada',
                        'start_time'         => 'Hora de Início',
                        'end_time'           => 'Hora de Fim',
                        'pickup_quota'       => 'Cota de Retirada',
                        'status'             => 'Status',
                        'save-btn'           => 'Salvar',
                        'success'            => 'Horário de retirada adicionado com sucesso.',
                        'duplicate'          => 'Já existe um horário de retirada para o dia e hora selecionados.',
                        'error'              => 'Erro ao adicionar horário de retirada.',
                    ],
                    'edit' => [
                        'title'              => 'Editar Horário de Retirada',
                        'inventory_source'   => 'Fonte de Inventário',
                        'pickup_day'         => 'Dia de Retirada',
                        'start_time'         => 'Hora de Início',
                        'end_time'           => 'Hora de Fim',
                        'pickup_quota'       => 'Cota de Retirada',
                        'status'             => 'Status',
                        'save-btn'           => 'Salvar',
                        'success'            => 'Horário de retirada atualizado com sucesso.',
                        'error'              => 'Erro ao atualizar horário de retirada.',
                    ],
                    'delete-success' => 'Horário de retirada excluído com sucesso.',
                    'delete-failed'  => 'Erro ao excluir horário de retirada.',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'Opções de Retirada',
                        'pickup_location'     => 'Selecione um local para retirar seu pedido',
                        'pickup_date'         => 'Escolha a data de retirada preferencial',
                        'pickup_time'         => 'Escolha o horário de retirada conveniente',
                        'no_pickup_locations' => 'Desculpe, não há locais de retirada disponíveis para os itens em seu carrinho.',
                        'no_time_slots'       => 'Desculpe, não há horários disponíveis para o local e data selecionados.',
                        'details-missing'     => 'Por favor, selecione um local, data e horário para a retirada.',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => 'Seu pedido está pronto para retirada!',
                    'ready_message'     => 'Seu pedido #:order_id, realizado em :created_at, está pronto para retirada.',
                    'details'           => 'Detalhes da Retirada',
                    'location'          => 'Local de Retirada',
                    'selected_timeslot' => 'Horário de Retirada Selecionado',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => 'Segunda-feira',
        2 => 'Terça-feira',
        3 => 'Quarta-feira',
        4 => 'Quinta-feira',
        5 => 'Sexta-feira',
        6 => 'Sábado',
        7 => 'Domingo',
    ],
];
