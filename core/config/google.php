<?php

return [

    /**
     *  目標的 google sheet
     */
    'web1' => [
        // p12 key path
        'key_file'      => 'var/web1.p12',
        'client_email'  => 'xxxxxxxxxx@xxxxxxxxxx.gserviceaccount.com',
        'sheet_1'  => [
            'book'   => 'Book1',    // 名稱要相同, 是一個 key 的作用
            'sheet'  => 'Sheet1',   // sheet key, 注意空白
            // google spreadsheets url key, 可以從 browser 上看到 url, 下載
            'urlKey' => '1Ab1Ab1Ab1Ab1Ab1Ab1Ab1Ab1Ab1Ab1Ab1Ab1Ab1Ab1A',
        ],
    ],

];
