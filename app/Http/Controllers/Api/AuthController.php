<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Models\User;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginUserRequest $request): JsonResponse
    {
        if (! Auth::attempt($request->only(['email', 'password']))) {
            return $this->error(
                'Invalid credentials',
                Response::HTTP_UNAUTHORIZED
            );
        }

        /** @var User $user */
        $user = User::firstWhere('email', $request->email);

        return $this->responseOk('Authenticated', [
            'token' => $user->createToken(
                name: 'API token for '.$user->name,
                abilities: ['*'],
                expiresAt: now()->addMonth()
            )->plainTextToken,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return $this->responseOk('Done');
    }
}
