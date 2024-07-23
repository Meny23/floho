<?php

use Spatie\RouteAttributes\Attributes\Prefix;

return [
    /*
     *  Automatic registration of routes will only happen if this setting is `true`
     */
    'enabled' => true,

    /*
     * Controllers in these directories that have routing attributes
     * will automatically be registered.
     *
     * Optionally, you can specify group configuration by using key/values
     */
    'directories' => [
        app_path('Http/Controllers/Web') => [
            'middleware' => [
                'auth',
                'web',
            ]
        ],
        app_path('Http/Controllers/Api/V1') => [
            'prefix' => 'api/v1',
            'middleware' => [
                'api',
                'auth:sanctum'
            ]
        ],
        app_path('Http/Controllers/Api/Auth') => [
            'prefix' => 'api/v1',
            'middleware' => 'api'
        ]
    ],

    /**
     * This middleware will be applied to all routes.
     */
    'middleware' => [
        \Illuminate\Routing\Middleware\SubstituteBindings::class
    ]
];
