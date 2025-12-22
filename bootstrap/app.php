<?php

use App\Exceptions\Api\v1\ApiExceptions;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $e, Request $request) {
            $className = $e::class;
            $handlers = ApiExceptions::$handlers;

            if (array_key_exists($className, $handlers)) {
                $method = $handlers[$className];

                return ApiExceptions::$method($e, $request);
            }

            return response()->json([
                'error' => [
                    'type' => class_basename($e::class),
                    'status' => intval($e->getCode()), // returns 0 if no code
                    'message' => $e->getMessage(),
                ],
            ]);

        });
    })->create();
