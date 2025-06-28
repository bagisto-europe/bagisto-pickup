<?php

return [
    'admin' => [
        'orders' => [
            'pickup' => [
                'title'    => 'ピックアップ情報',
                'location' => 'ピックアップ場所',
                'date'     => 'ピックアップ日',
                'time'     => 'ピックアップ時間',
            ],
        ],
        'system' => [
            'title'                => 'タイトル',
            'description'          => '説明',
            'default_rate'         => 'デフォルト料金',
            'pickup'               => '店舗でのピックアップ',
            'status'               => 'ステータス',
            'display_address'      => 'チェックアウトフォームにピックアップ住所を表示',
            'instore_payment_only' => 'ピックアップ注文には店舗での支払いのみ許可',
        ],
        'settings' => [
            'acl' => [
                'pickup_timeslots' => 'ピックアップ時間帯',
                'create'           => '作成',
                'delete'           => '削除',
                'edit'             => '編集',
            ],
            'pickup' => [
                'timeslots' => [
                    'index' => [
                        'title'        => 'ピックアップ時間帯',
                        'add-button'   => 'ピックアップ時間帯を追加',
                        'no-timeslots' => 'まだピックアップ時間帯は追加されていません。',
                        'filter'       => [
                            'title'            => 'ピックアップ時間帯をフィルタリング',
                            'clear'            => 'フィルターをクリア',
                            'day'              => '日',
                            'all_days'         => 'すべての日',
                            'all_inventories'  => 'すべての場所',
                            'inventory_source' => '在庫ソース',
                        ],
                        'datagrid' => [
                            'id'                  => 'ID',
                            'inventory_source'    => '在庫ソース',
                            'day'                 => '日',
                            'weekday'             => '曜日',
                            'date'                => 'ピックアップ日',
                            'pickup_quota'        => 'ピックアップクォータ',
                            'start_time'          => '開始時間',
                            'end_time'            => '終了時間',
                            'status'              => 'ステータス',
                            'actions'             => 'アクション',
                            'edit'                => '編集',
                            'delete'              => '削除',
                            'mass-delete'         => '削除',
                            'mass-delete-success' => 'ピックアップ時間帯は正常に削除されました。',
                            'mass-delete-error'   => 'ピックアップ時間帯の削除中にエラーが発生しました。',
                        ],
                    ],
                    'create' => [
                        'title'              => '時間帯を追加',
                        'inventory_source'   => '在庫ソース',
                        'pickup_day'         => 'ピックアップ日',
                        'start_time'         => '開始時間',
                        'end_time'           => '終了時間',
                        'pickup_quota'       => 'ピックアップクォータ',
                        'status'             => 'ステータス',
                        'save-btn'           => '保存',
                        'success'            => 'ピックアップ時間帯が正常に追加されました。',
                        'duplicate'          => '選択した日と時間には既にピックアップ時間帯があります。',
                        'error'              => 'ピックアップ時間帯の追加中にエラーが発生しました。',
                    ],
                    'edit' => [
                        'title'              => 'ピックアップ時間帯を編集',
                        'inventory_source'   => '在庫ソース',
                        'pickup_day'         => 'ピックアップ日',
                        'start_time'         => '開始時間',
                        'end_time'           => '終了時間',
                        'pickup_quota'       => 'ピックアップクォータ',
                        'status'             => 'ステータス',
                        'save-btn'           => '保存',
                        'success'            => 'ピックアップ時間帯が正常に更新されました。',
                        'error'              => 'ピックアップ時間帯の更新中にエラーが発生しました。',
                    ],
                    'delete-success' => 'ピックアップ時間帯は正常に削除されました。',
                    'delete-failed'  => 'ピックアップ時間帯の削除中にエラーが発生しました。',
                ],
            ],
        ],
    ],
    'shop' => [
        'checkout' => [
            'onepage' => [
                'shipping' => [
                    'pickup' => [
                        'title'               => 'ピックアップオプション',
                        'pickup_location'     => 'ご注文を受け取る場所を選択してください',
                        'pickup_date'         => '希望のピックアップ日を選んでください',
                        'pickup_time'         => '便利なピックアップ時間を選んでください',
                        'no_pickup_locations' => '申し訳ありませんが、カート内の商品にはピックアップ場所がありません。',
                        'no_time_slots'       => '申し訳ありませんが、選択した場所と日付には利用可能な時間帯がありません。',
                        'details-missing'     => 'ピックアップ場所、日付、時間を選択してください。',
                    ],
                ],
            ],
        ],
        'emails' => [
            'orders' => [
                'pickup' => [
                    'ready_subject'     => 'ご注文の準備ができました！',
                    'ready_message'     => 'ご注文 #:order_id は :created_at にご注文いただき、ピックアップの準備が整いました。',
                    'details'           => 'ピックアップの詳細',
                    'location'          => 'ピックアップ場所',
                    'selected_timeslot' => '選択したピックアップ時間帯',
                ],
            ],
        ],
    ],
    'week_days' => [
        1 => '月曜日',
        2 => '火曜日',
        3 => '水曜日',
        4 => '木曜日',
        5 => '金曜日',
        6 => '土曜日',
        7 => '日曜日',
    ],
];
