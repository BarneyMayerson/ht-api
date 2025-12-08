<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(): JsonResponse
    {
        return $this->ok('Hi, login.');
    }
}
