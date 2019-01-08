<?php

return [
    'name' => 'GestaoTrocasUser',
    'email' => [
        'user_created' => [
            'subject' => config('app.name') . ' - Sua conta foi criada'
        ]
    ],
    'middleware' => [
        'isVerified' => 'isVerified'
    ],
    "user-default" => [
        'name' => env('USER_NAME', 'Administrador'),
        'email' => env('USER_EMAIL', 'Admin@user.com'),
        'password' => env('USER_PASSWORD', 'admin1'),
        'enrolment' => env('USER_ENROLMENT', 'adm0'),
        'unit_id' => env('USER_UNIT', 1)
    ],
    'acl' => [
        'role_admin' => env('ROLE_ADMIN', 'Admin'),
        'controllers_annotations' => [
            __DIR__.'/../Modules/GestaoTrocasUser/Http/Controllers'
        ]
    ]
];