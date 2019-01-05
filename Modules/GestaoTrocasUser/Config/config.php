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
    ]
];
