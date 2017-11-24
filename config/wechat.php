<?php

return [
    'debug'  => true,
    'app_id' => env('WX_APP_ID'),
    'secret' => env('WX_SECRET'),
    'token'  => env('WX_TOKEN'),

    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/easywechat.log',
    ],

    'payment' => [
        'merchant_id'        => env('WX_MERCHANT_ID'),
        'key'                => env('WX_KEY'),
        'cert_path'          => app_path().env('WX_CERT_PATH'),
        'key_path'           => app_path().env('WX_KEY_PATH'),
        'notify_url'         => '默认的订单回调地址',
    ],
];