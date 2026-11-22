<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Daftarkan alias middleware agar bisa dipakai di Route::middleware([...])
        $middleware->alias([
            'auth.admin'          => \App\Http\Middleware\AuthAdmin::class,
            'auth.pelanggan'      => \App\Http\Middleware\AuthPelanggan::class,
            'guest.admin'         => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'guest.pelanggan'     => \App\Http\Middleware\RedirectIfAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
