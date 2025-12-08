<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Api\LoginRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginRequest $request): JsonResponse
    {
        return $this->ok($request->get('email'));
    }
}
