<?php

use App\Http\Middleware\CheckAgeMiddleware;
use App\Http\Middleware\LogHttpRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //% Middleware Aliases

        $middleware->alias([
            'checkAgeMiddleware' => CheckAgeMiddleware::class,
            //% Other middlewares...
        ]);

        //! Global Middleware executes on EVERY HTTP request
        $middleware->web(append: [
            LogHttpRequests::class,

            //% Other middlewares...
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
