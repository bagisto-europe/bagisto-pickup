<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'מידע על איסוף',
                'location' => 'מיקום איסוף',
                'date'     => 'תאריך איסוף',
                'time'     => 'שעת איסוף',
            ],
        ],
        'system' => [
            'title'                => 'כותרת',
            'description'          => 'תיאור',
            'default_rate'         => 'שיעור ברירת מחדל',
            'pickup'               => 'איסוף מהחנות',
            'status'               => 'סטטוס',
            'display_address'      => 'הצג כתובת איסוף בטופס התשלום',
            'instore_payment_only' => 'אפשר רק תשלום בחנות עבור הזמנות איסוף',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'זמני איסוף',
                'create'           => 'יצירה',
                'delete'           => 'מחק',
                'edit'             => 'ערוך',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'זמני איסוף',
                        'add-button'   => 'הוסף זמן איסוף',
                        'no-timeslots' => 'לא הוספו זמני איסוף עדיין.',
                        'filter'       => [
                            'title'            => 'סנן זמני איסוף',
                            'clear'            => 'נקה סינונים',
                            'day'              => 'יום',
                            'all_days'         => 'כל הימים',
                            'all_inventories'  => 'כל המיקומים',
                            'inventory_source' => 'מקור מלאי',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => 'מקור מלאי',
                            'day'                 => 'יום',
                            'weekday'             => 'יום בשבוע',
                            'date'                => 'תאריך איסוף',
                            'pickup_quota'        => 'מכסת איסוף',
                            'start_time'          => 'שעת התחלה',
                            'end_time'            => 'שעת סיום',
                            'status'              => 'סטטוס',
                            'actions'             => 'פעולות',
                            'edit'                => 'ערוך',
                            'delete'              => 'מחק',
                            'mass-delete'         => 'מחק',
                            'mass-delete-success' => 'הזמן הוסר בהצלחה.',
                            'mass-delete-error'   => 'שגיאה בהסרת הזמן.',
                        ],
                    ],
                    'create' => [
                        'title'              => 'הוסף זמן איסוף',
                        'inventory_source'   => 'מקור מלאי',
                        'pickup_day'         => 'יום איסוף',
                        'start_time'         => 'שעת התחלה',
                        'end_time'           => 'שעת סיום',
                        'pickup_quota'       => 'מכסת איסוף',
                        'status'             => 'סטטוס',
                        'save-btn'           => 'שמור',
                        'success'            => 'הזמן נוסף בהצלחה.',
                        'duplicate'          => 'הזמן כבר קיים עבור היום והשעה שנבחרו.',
                        'error'              => 'שגיאה בהוספת הזמן.',
                    ],
                    'edit' => [
                        'title'              => 'ערוך זמן איסוף',
                        'inventory_source'   => 'מקור מלאי',
                        'pickup_day'         => 'יום איסוף',
                        'start_time'         => 'שעת התחלה',
                        'end_time'           => 'שעת סיום',
                        'pickup_quota'       => 'מכסת איסוף',
                        'status'             => 'סטטוס',
                        'save-btn'           => 'שמור',
                        'success'            => 'הזמן עודכן בהצלחה.',
                        'error'              => 'שגיאה בעדכון הזמן.',
                    ],
                    'delete-success' => 'הזמן הוסר בהצלחה.',
                    'delete-failed'  => 'שגיאה בהסרת הזמן.',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'אפשרויות איסוף',
                        'pickup_location'     => 'בחר מקום לאיסוף ההזמנה שלך',
                        'pickup_date'         => 'בחר את תאריך האיסוף המועדף עליך',
                        'pickup_time'         => 'בחר שעה נוחה לאיסוף',
                        'no_pickup_locations' => 'סליחה, אין מקומות איסוף זמינים עבור הפריטים בעגלת הקניות שלך.',
                        'no_time_slots'       => 'סליחה, אין שעות זמינות עבור המיקום והתאריך שנבחרו.',
                        'details-missing'     => 'נא לבחור מקום, תאריך ושעה לאיסוף.',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => 'ההזמנה שלך מוכנה לאיסוף!',
                    'ready_message'     => 'ההזמנה שלך #:order_id, שהוזמנה ב :created_at, מוכנה לאיסוף.',
                    'details'           => 'פרטי איסוף',
                    'location'          => 'מיקום איסוף',
                    'selected_timeslot' => 'הזמן שנבחר לאיסוף',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => 'יום ראשון',
        2 => 'יום שני',
        3 => 'יום שלישי',
        4 => 'יום רביעי',
        5 => 'יום חמישי',
        6 => 'יום שישי',
        7 => 'יום שבת',
    ],
];
