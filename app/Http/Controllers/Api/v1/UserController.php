<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\ReplaceUserRequest;
use App\Http\Requests\Api\v1\StoreUserRequest;
use App\Http\Requests\Api\v1\UpdateUserRequest;
use App\Http\Resources\v1\UserResource;
use App\Models\User;
use App\Policies\Api\v1\UserPolicy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends ApiController
{
    protected string $policyClass = UserPolicy::class;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection<int, UserResource>
     */
    public function index()
    {
        return UserResource::collection(
            User::query()
                ->withRequest()
                ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $this->authorize('store', User::class);

            return UserResource::make(User::create($request->mappedAttributes()));
        } catch (AuthorizationException) {
            return $this->error(
                'You are not authorized to create that resource',
                Response::HTTP_FORBIDDEN,
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $userId): JsonResponse|UserResource
    {
        try {
            $user = User::findOrFail($userId);

            if ($this->include('tickets')) {
                return new UserResource($user->load('tickets'));
            }

            return UserResource::make($user);
        } catch (ModelNotFoundException) {
            return $this->error('User not found', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, int $ticketId): JsonResponse|UserResource
    {
        try {
            $user = User::findOrFail($ticketId);

            $this->authorize('update', $user);
            $user->update($request->mappedAttributes());

            return UserResource::make($user);
        } catch (ModelNotFoundException) {
            return $this->error('User not found', Response::HTTP_NOT_FOUND);
        } catch (AuthorizationException) {
            return $this->error('You are not authorized to update that resource', Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Replace the specified resource in storage. (PUT request method)
     */
    public function replace(ReplaceUserRequest $request, $user_id): JsonResponse|UserResource
    {
        try {
            $user = User::query()->findOrFail($user_id);

            $this->authorize('replace', $user);
            $user->update($request->mappedAttributes());

            return new UserResource($user);
        } catch (ModelNotFoundException) {
            return $this->error('User cannot be found', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $userId): JsonResponse
    {
        try {
            $user = User::findOrFail($userId);

            $this->authorize('delete', $user);
            $user->delete();

            return $this->responseOk('User has been deleted.');
        } catch (ModelNotFoundException) {
            return $this->error('User not found', Response::HTTP_NOT_FOUND);
        } catch (AuthorizationException) {
            return $this->error('You are not authorized to delete that resource', Response::HTTP_UNAUTHORIZED);
        }
    }
}
