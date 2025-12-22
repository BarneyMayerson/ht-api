<?php

declare(strict_types=1);

namespace App\Exceptions\Api\v1;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiExceptions
{
    /**
     * @var array<class-string<\Throwable>, string>
     */
    public static array $handlers = [
        AccessDeniedHttpException::class => 'handleAuthenticationException',
        AuthenticationException::class => 'handleAuthenticationException',
        ValidationException::class => 'handleValidationException',
        ModelNotFoundException::class => 'handleNotFoundException',
        NotFoundHttpException::class => 'handleNotFoundException',
    ];

    public static function handleAuthenticationException(
        AccessDeniedHttpException|AuthenticationException $e,
        Request $request,
    ): JsonResponse {
        // log that sensitive stuff
        // should move this out to custom logger
        $source = 'Line: '.$e->getLine().', File: '.$e->getFile();
        Log::notice(class_basename($e::class).' | '.$e->getMessage().' | '.$source);

        return response()->json([
            'error' => [
                'type' => class_basename($e::class),
                'status' => Response::HTTP_FORBIDDEN,
                'message' => $e->getMessage(),
            ],
        ]);
    }

    public static function handleValidationException(
        ValidationException $e,
        Request $request,
    ): JsonResponse {
        $errors = [];

        foreach ($e->errors() as $value) {
            foreach ($value as $message) {
                $errors[] = [
                    'type' => class_basename($e::class),
                    'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                    'message' => $message,
                ];
            }
        }

        return response()->json([
            'errors' => $errors,
        ]);
    }

    /**
     * @param  ModelNotFoundException<\Illuminate\Database\Eloquent\Model>|NotFoundHttpException  $e
     */
    public static function handleNotFoundException(
        ModelNotFoundException|NotFoundHttpException $e,
        Request $request,
    ): JsonResponse {
        return response()->json([
            'error' => [
                'type' => implode('', array_slice(explode('\\', $e::class), -1)),
                'status' => Response::HTTP_NOT_FOUND,
                'message' => 'Not Found '.$request->getRequestUri(),
            ],
        ]);
    }
}
