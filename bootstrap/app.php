<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix('alumnos')
                ->group(base_path('routes/alumnos.php'));

            Route::middleware('web')
                ->prefix('grados')
                ->group(base_path('routes/grados.php'));

                Route::middleware('web')
                ->prefix('cursos')
                ->group(base_path('routes/cursos.php'));

                Route::middleware('web')
                ->prefix('mis-secciones')
                ->group(base_path('routes/mis_secciones.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //

        $middleware->alias([
            'rol_director' => \App\Http\Middleware\Users\DirectorMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();