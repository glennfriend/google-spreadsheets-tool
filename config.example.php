<?php
/**
 *  這裡的設定值, 將會覆蓋 core/config/ 下相同名稱的值
 */
return [
    'app' => [
        /**
         *  不論在任何情況下, 正式的環境都必須使用 "production" 為 env 的值
         */
        'env' => 'production',
        'project' => [
            'name' => 'Google Spreadsheets Tool',
        ],
    ],
    'google' => [
        'web1' => [
            'key_file'      => 'var/web1.p12',
            'client_email'  => '',
            'sheet_1'  => [
                'book'   => 'Book1',
                'sheet'  => 'Sheet1',
                'urlKey' => '',
            ]
        ]
    ],
];
