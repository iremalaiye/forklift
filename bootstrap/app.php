<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\SiteSettingMiddleware;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    //middleware added
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'subscribed' => EnsureUserIsSubscribed::class,
             'contactinformation' => \App\Http\Middleware\SiteSettingMiddleware::class,
            'panelsetting' => \App\Http\Middleware\PanelSettingMiddleware::class,
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
