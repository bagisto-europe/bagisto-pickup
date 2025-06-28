<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => '取货信息',
                'location' => '取货地点',
                'date'     => '取货日期',
                'time'     => '取货时间',
            ],
        ],
        'system' => [
            'title'                => '标题',
            'description'          => '描述',
            'default_rate'         => '默认费率',
            'pickup'               => '在商店取货',
            'status'               => '状态',
            'display_address'      => '在结账表单中显示取货地址',
            'instore_payment_only' => '仅允许在店内支付取货订单',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => '取货时间段',
                'create'           => '创建',
                'delete'           => '删除',
                'edit'             => '编辑',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => '取货时间段',
                        'add-button'   => '添加取货时间段',
                        'no-timeslots' => '尚未添加取货时间段。',
                        'filter'       => [
                            'title'            => '筛选取货时间段',
                            'clear'            => '清除筛选',
                            'day'              => '日期',
                            'all_days'         => '所有天数',
                            'all_inventories'  => '所有地点',
                            'inventory_source' => '库存来源',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => '库存来源',
                            'day'                 => '日期',
                            'weekday'             => '星期几',
                            'date'                => '取货日期',
                            'pickup_quota'        => '取货配额',
                            'start_time'          => '开始时间',
                            'end_time'            => '结束时间',
                            'status'              => '状态',
                            'actions'             => '操作',
                            'edit'                => '编辑',
                            'delete'              => '删除',
                            'mass-delete'         => '删除',
                            'mass-delete-success' => '取货时间段已成功删除。',
                            'mass-delete-error'   => '删除取货时间段时出错。',
                        ],
                    ],
                    'create' => [
                        'title'              => '添加取货时间段',
                        'inventory_source'   => '库存来源',
                        'pickup_day'         => '取货日期',
                        'start_time'         => '开始时间',
                        'end_time'           => '结束时间',
                        'pickup_quota'       => '取货配额',
                        'status'             => '状态',
                        'save-btn'           => '保存',
                        'success'            => '取货时间段已成功创建。',
                        'duplicate'          => '选定日期和时间已有取货时间段。',
                        'error'              => '创建取货时间段时出错。',
                    ],
                    'edit' => [
                        'title'              => '编辑取货时间段',
                        'inventory_source'   => '库存来源',
                        'pickup_day'         => '取货日期',
                        'start_time'         => '开始时间',
                        'end_time'           => '结束时间',
                        'pickup_quota'       => '取货配额',
                        'status'             => '状态',
                        'save-btn'           => '保存',
                        'success'            => '取货时间段已成功更新。',
                        'error'              => '更新取货时间段时出错。',
                    ],
                    'delete-success' => '取货时间段已成功删除。',
                    'delete-failed'  => '删除取货时间段时出错。',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => '取货选项',
                        'pickup_location'     => '选择您的取货地点',
                        'pickup_date'         => '选择您希望的取货日期',
                        'pickup_time'         => '选择方便的取货时间',
                        'no_pickup_locations' => '抱歉，没有可用的取货地点。',
                        'no_time_slots'       => '抱歉，所选日期和地点没有可用的取货时间。',
                        'details-missing'     => '请选择取货地点、日期和时间。',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => '您的订单已准备好取货！',
                    'ready_message'     => '您的订单 #:order_id 于 :created_at 下单，现在可以取货。',
                    'details'           => '取货详情',
                    'location'          => '取货地点',
                    'selected_timeslot' => '选择的取货时间',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => '星期一',
        2 => '星期二',
        3 => '星期三',
        4 => '星期四',
        5 => '星期五',
        6 => '星期六',
        7 => '星期天',
    ],
];
