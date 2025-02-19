<?php

return [
    /**
     * Enable or disable the analytics middleware
     */
    'enabled' => env('APP_ANALYTICS_ENABLED', true),

    /**
     * The database connection to use for storing the analytics data
     */
    'database_connection' => env('APP_ANALYTICS_DATABASE_CONNECTION', 'mysql'),

    /**
     * Any paths that should be ignored from being tracked. Wildcard support via Str::is()
     */
    'ignored_paths' => [
        '_debugbar*',
        'flux*',
    ],

    /**
     * Any user agents that should be ignored from being tracked. Wildcard support via Str::is()
     */
    'ignored_user_agents' => [
        // 'Googlebot',
    ],
];
