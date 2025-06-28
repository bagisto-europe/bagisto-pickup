<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'معلومات الاستلام',
                'location' => 'موقع الاستلام',
                'date'     => 'تاريخ الاستلام',
                'time'     => 'وقت الاستلام',
            ],
        ],
        'system' => [
            'title'                => 'العنوان',
            'description'          => 'الوصف',
            'default_rate'         => 'السعر الافتراضي',
            'pickup'               => 'الاستلام من المتجر',
            'status'               => 'الحالة',
            'display_address'      => 'عرض عنوان الاستلام في نموذج الدفع',
            'instore_payment_only' => 'السماح فقط بالدفع في المتجر لطلبات الاستلام',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'فترات الاستلام',
                'create'           => 'إنشاء',
                'delete'           => 'حذف',
                'edit'             => 'تعديل',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'فترات الاستلام',
                        'add-button'   => 'إضافة فترة استلام',
                        'no-timeslots' => 'لم يتم إضافة أي فترات بعد.',
                        'filter'       => [
                            'title'            => 'تصفية الفترات',
                            'clear'            => 'مسح الفلاتر',
                            'day'              => 'اليوم',
                            'all_days'         => 'جميع الأيام',
                            'all_inventories'  => 'جميع المواقع',
                            'inventory_source' => 'مصدر المخزون',
                        ],
                        'datagrid' => [
                            'id'                  => 'المعرف',
                            'inventory_source'    => 'مصدر المخزون',
                            'day'                 => 'اليوم',
                            'weekday'             => 'يوم الأسبوع',
                            'date'                => 'تاريخ الاستلام',
                            'pickup_quota'        => 'الحد الأقصى للاستلام',
                            'start_time'          => 'وقت البدء',
                            'end_time'            => 'وقت الانتهاء',
                            'status'              => 'الحالة',
                            'actions'             => 'الإجراءات',
                            'edit'                => 'تعديل',
                            'delete'              => 'حذف',
                            'mass-delete'         => 'حذف',
                            'mass-delete-success' => 'تم حذف الفترات بنجاح.',
                            'mass-delete-error'   => 'حدث خطأ أثناء حذف الفترات.',
                        ],
                    ],
                    'create' => [
                        'title'              => 'إضافة فترة',
                        'inventory_source'   => 'مصدر المخزون',
                        'pickup_day'         => 'يوم الاستلام',
                        'start_time'         => 'وقت البدء',
                        'end_time'           => 'وقت الانتهاء',
                        'pickup_quota'       => 'الحد الأقصى للاستلام',
                        'status'             => 'الحالة',
                        'save-btn'           => 'حفظ',
                        'success'            => 'تم إنشاء الفترة بنجاح.',
                        'duplicate'          => 'الفترة موجودة بالفعل لهذا اليوم والوقت.',
                        'error'              => 'حدث خطأ أثناء إنشاء الفترة.',
                    ],
                    'edit' => [
                        'title'              => 'تعديل الفترة',
                        'inventory_source'   => 'مصدر المخزون',
                        'pickup_day'         => 'يوم الاستلام',
                        'start_time'         => 'وقت البدء',
                        'end_time'           => 'وقت الانتهاء',
                        'pickup_quota'       => 'الحد الأقصى للاستلام',
                        'status'             => 'الحالة',
                        'save-btn'           => 'حفظ',
                        'success'            => 'تم تحديث الفترة بنجاح.',
                        'error'              => 'حدث خطأ أثناء تحديث الفترة.',
                    ],
                    'delete-success' => 'تم حذف الفترة بنجاح.',
                    'delete-failed'  => 'حدث خطأ أثناء حذف الفترة.',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'خيارات الاستلام',
                        'pickup_location'     => 'اختر موقعًا لاستلام طلبك',
                        'pickup_date'         => 'اختر تاريخ الاستلام المفضل',
                        'pickup_time'         => 'اختر وقتًا مناسبًا',
                        'no_pickup_locations' => 'عذرًا، لا توجد مواقع استلام متاحة للعناصر في سلة التسوق الخاصة بك.',
                        'no_time_slots'       => 'عذرًا، لا توجد فترات متاحة للموقع والتاريخ المحددين.',
                        'details-missing'     => 'يرجى اختيار موقع وتاريخ ووقت الاستلام.',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => 'طلبك جاهز للاستلام!',
                    'ready_message'     => 'طلبك #:order_id، الذي تم تقديمه في :created_at، جاهز الآن للاستلام.',
                    'details'           => 'تفاصيل الاستلام',
                    'location'          => 'موقع الاستلام',
                    'selected_timeslot' => 'الفترة التي اخترتها',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => 'الاثنين',
        2 => 'الثلاثاء',
        3 => 'الأربعاء',
        4 => 'الخميس',
        5 => 'الجمعة',
        6 => 'السبت',
        7 => 'الأحد',
    ],
];
