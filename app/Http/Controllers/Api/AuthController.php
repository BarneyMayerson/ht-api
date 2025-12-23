<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Models\User;
use App\Permissions\Api\v1\Abilities;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;

    /**
     * Login
     *
     * Authenticates the user and returns the user's API token
     *
     * @unauthenticated
     *
     * @group Authentication
     *
     * @response 200 {
        "data": {
            "token": "{YOUR_AUTH_KEY}"
        },
        "message": "Authenticated",
        "status": 200
     * }
     */
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
                abilities: Abilities::getAbilities($user),
                expiresAt: now()->addMonth()
            )->plainTextToken,
        ]);
    }

    /**
     * Logout
     *
     * Logs out the user and destroys the API token.
     *
     * @group Authentication
     *
     * @response 200 {
        "message": "Done",
        "data": [],
        "status": 200
     * }
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()?->currentAccessToken()->delete();

        return $this->responseOk('Done');
    }
}
