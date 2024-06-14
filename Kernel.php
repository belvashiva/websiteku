<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Middleware global
    ];

    protected $middlewareGroups = [
        'web' => [
            // Middleware grup web
        ],
        'api' => [
            // Middleware grup API
        ],
    ];

    protected $routeMiddleware = [
        // Middleware rute
        'auth.custom' => \App\Http\Middleware\AuthMiddleware::class,
    ];
}
