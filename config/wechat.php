<?php

return [
    'debug'  => true,
    'app_id' => 'wx426b3015555a46be',
    'secret' => '7813490da6f1265e4901ffb80afaa36f',
    'token'  => 'erng0imag3kuzttx1ozabnvhbk0jwldf',

    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/easywechat.log',
    ],

    'payment' => [
        'merchant_id'        => '1900009851',
        'key'                => '8934e7d15453e97507ef794cf7b0519d',
        'cert_path'          => app_path().'/Payment/Wxpay/cert/apiclient_cert.pem',
        'key_path'           => app_path().'/Payment/Wxpay/cert/apiclient_key.pem',
        'notify_url'         => '默认的订单回调地址',
    ],
];