<?php

declare(strict_types=1);

namespace App\Traits;

trait ApiResponses
{
    protected function ok($message)
    {
        return $this->success($message);
    }

    protected function success($message, $statusCode = 200)
    {
        return response()->json(
            [
                'message' => $message,
                'status' => $statusCode,
            ],
            $statusCode
        );
    }
}
