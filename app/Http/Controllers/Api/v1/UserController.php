<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\ReplaceUserRequest;
use App\Http\Requests\Api\v1\StoreUserRequest;
use App\Http\Requests\Api\v1\UpdateUserRequest;
use App\Http\Resources\v1\UserResource;
use App\Models\User;
use App\Policies\Api\v1\UserPolicy;
use Illuminate\Http\JsonResponse;

class UserController extends ApiController
{
    protected string $policyClass = UserPolicy::class;

    /**
     * Get paginated users.
     *
     * @group Managing Users
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection<int, UserResource>
     */
    public function index()
    {
        return UserResource::collection(
            User::query()
                ->withRequest()
                ->paginate()
        );
    }

    /**
     * Create a user
     *
     * Creates a new user record.
     *
     * @group Managing Users
     *
     * @response 200
     */
    public function store(StoreUserRequest $request): JsonResponse|UserResource
    {
        $this->authorize('store', User::class);

        return UserResource::make(User::create($request->mappedAttributes()));
    }

    /**
     * Show a specific user.
     *
     * Display the individual user.
     *
     * @group Managing Users
     *
     * @queryParam include string Relationship(s) to including. Separate multiple relationships with commas. Not existing relationship will be ignored. Example: tickets
     *
     * @response 200
     */
    public function show(User $user): JsonResponse|UserResource
    {
        if ($this->include('tickets')) {
            return new UserResource($user->load('tickets'));
        }

        return UserResource::make($user);
    }

    /**
     * Update a specific user.
     *
     * Updates various filds of the user.
     *
     * @group Managing Users
     *
     * @response 200
     */
    public function update(UpdateUserRequest $request, User $user): JsonResponse|UserResource
    {
        $this->authorize('update', $user);
        $user->update($request->mappedAttributes());

        return UserResource::make($user);
    }

    /**
     * Replace a specific user.
     *
     * Updates all fields of the user.
     *
     * @group Managing Users
     *
     * @response 200
     */
    public function replace(ReplaceUserRequest $request, User $user): JsonResponse|UserResource
    {
        $this->authorize('replace', $user);
        $user->update($request->mappedAttributes());

        return new UserResource($user);
    }

    /**
     * Delete a specific user.
     *
     * Deletes the user with related tickets.
     *
     * @group Managing Users
     *
     * @response 200
     */
    public function destroy(User $user): JsonResponse
    {
        $this->authorize('delete', $user);
        $user->delete();

        return $this->responseOk('User has been deleted.');
    }
}
