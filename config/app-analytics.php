<?php

return [
    'enabled' => env('APP_ANALYTICS_ENABLED', true),

    'database_connection' => env('APP_ANALYTICS_DATABASE_CONNECTION', 'mysql'),

    'ignored_paths' => [
        '_debugbar*',
        'flux*',
    ],
];
