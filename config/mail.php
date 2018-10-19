<?php

return [

    'driver' => env('MAIL_DRIVER', 'smtp'),

    'host' => env('MAIL_HOST', 'smtp.kinghost.net'),

    'port' => env('MAIL_PORT', 465),

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'no-reply@soitic.com'),
        'name' => env('MAIL_FROM_NAME', 'MULTI-2'),
    ],

    'encryption' => env('MAIL_ENCRYPTION', 'ssl'),

    'username' => env('MAIL_USERNAME', 'no-reply@soitic.com'),

    'password' => env('MAIL_PASSWORD', 'N0001EMAILy'),

    'sendmail' => '/usr/sbin/sendmail -bs',

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
