<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'Teslimat Bilgisi',
                'location' => 'Teslimat Yeri',
                'date'     => 'Teslimat Tarihi',
                'time'     => 'Teslimat Saati',
            ],
        ],
        'system' => [
            'title'                => 'Başlık',
            'description'          => 'Açıklama',
            'default_rate'         => 'Varsayılan Oran',
            'pickup'               => 'Mağazadan Teslimat',
            'status'               => 'Durum',
            'display_address'      => 'Teslimat adresini ödeme sayfasında göster',
            'instore_payment_only' => 'Sadece mağazada ödeme yapılmasına izin ver',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'Teslimat Zaman Dilimleri',
                'create'           => 'Oluştur',
                'delete'           => 'Sil',
                'edit'             => 'Düzenle',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'Teslimat Zaman Dilimleri',
                        'add-button'   => 'Teslimat Zaman Dilimi Ekle',
                        'no-timeslots' => 'Henüz teslimat zaman dilimi eklenmedi.',
                        'filter'       => [
                            'title'            => 'Zaman Dilimlerini Filtrele',
                            'clear'            => 'Filtreleri Temizle',
                            'day'              => 'Gün',
                            'all_days'         => 'Tüm Günler',
                            'all_inventories'  => 'Tüm Konumlar',
                            'inventory_source' => 'Envanter Kaynağı',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => 'Envanter Kaynağı',
                            'day'                 => 'Gün',
                            'weekday'             => 'Haftanın Günü',
                            'date'                => 'Teslimat Tarihi',
                            'pickup_quota'        => 'Teslimat Kotası',
                            'start_time'          => 'Başlangıç Saati',
                            'end_time'            => 'Bitiş Saati',
                            'status'              => 'Durum',
                            'actions'             => 'Eylemler',
                            'edit'                => 'Düzenle',
                            'delete'              => 'Sil',
                            'mass-delete'         => 'Sil',
                            'mass-delete-success' => 'Zaman dilimi başarıyla silindi.',
                            'mass-delete-error'   => 'Zaman dilimi silinirken hata oluştu.',
                        ],
                    ],
                    'create' => [
                        'title'              => 'Zaman Dilimi Ekle',
                        'inventory_source'   => 'Envanter Kaynağı',
                        'pickup_day'         => 'Teslimat Günü',
                        'start_time'         => 'Başlangıç Saati',
                        'end_time'           => 'Bitiş Saati',
                        'pickup_quota'       => 'Teslimat Kotası',
                        'status'             => 'Durum',
                        'save-btn'           => 'Kaydet',
                        'success'            => 'Zaman dilimi başarıyla oluşturuldu.',
                        'duplicate'          => 'Seçilen gün ve saat için zaman dilimi zaten mevcut.',
                        'error'              => 'Zaman dilimi oluşturulurken hata oluştu.',
                    ],
                    'edit' => [
                        'title'              => 'Zaman Dilimi Düzenle',
                        'inventory_source'   => 'Envanter Kaynağı',
                        'pickup_day'         => 'Teslimat Günü',
                        'start_time'         => 'Başlangıç Saati',
                        'end_time'           => 'Bitiş Saati',
                        'pickup_quota'       => 'Teslimat Kotası',
                        'status'             => 'Durum',
                        'save-btn'           => 'Kaydet',
                        'success'            => 'Zaman dilimi başarıyla güncellendi.',
                        'error'              => 'Zaman dilimi güncellenirken hata oluştu.',
                    ],
                    'delete-success' => 'Zaman dilimi başarıyla silindi.',
                    'delete-failed'  => 'Zaman dilimi silinirken hata oluştu.',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'Teslimat Seçenekleri',
                        'pickup_location'     => 'Siparişinizi almak için bir yer seçin',
                        'pickup_date'         => 'Tercih ettiğiniz teslimat tarihini seçin',
                        'pickup_time'         => 'Uygun bir zaman dilimi seçin',
                        'no_pickup_locations' => 'Ürünleriniz için mevcut teslimat noktası yok.',
                        'no_time_slots'       => 'Seçilen tarih ve yer için uygun zaman dilimi yok.',
                        'details-missing'     => 'Lütfen teslimat noktası, tarih ve saat seçin.',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => 'Siparişiniz teslimat için hazır!',
                    'ready_message'     => 'Siparişiniz #:order_id, :created_at tarihinde verildi ve teslimat için hazır.',
                    'details'           => 'Teslimat Detayları',
                    'location'          => 'Teslimat Yeri',
                    'selected_timeslot' => 'Seçilen Zaman Dilimi',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => 'Pazartesi',
        2 => 'Salı',
        3 => 'Çarşamba',
        4 => 'Perşembe',
        5 => 'Cuma',
        6 => 'Cumartesi',
        7 => 'Pazar',
    ],
];
