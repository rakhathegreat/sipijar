<?php

return [
    'panels' => [
        'admin' => [
            'path' => 'admin',
            'auth' => [
                'guard' => 'web',
                'pages' => [
                    'login' => \Filament\Pages\Auth\Login::class,
                ],
            ],
        ],
        'user' => [
            'path' => 'user',
            'auth' => [
                'guard' => 'web',
                'pages' => [
                    'login' => \Filament\Pages\Auth\Login::class,
                ],
            ],
        ],
    ],
];