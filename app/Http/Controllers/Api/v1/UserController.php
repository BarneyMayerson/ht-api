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
    public function store(StoreUserRequest $request): JsonResponse|UserResource
    {
        $this->authorize('store', User::class);

        return UserResource::make(User::create($request->mappedAttributes()));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse|UserResource
    {
        if ($this->include('tickets')) {
            return new UserResource($user->load('tickets'));
        }

        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): JsonResponse|UserResource
    {
        $this->authorize('update', $user);
        $user->update($request->mappedAttributes());

        return UserResource::make($user);
    }

    /**
     * Replace the specified resource in storage. (PUT request method)
     */
    public function replace(ReplaceUserRequest $request, User $user): JsonResponse|UserResource
    {
        $this->authorize('replace', $user);
        $user->update($request->mappedAttributes());

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): JsonResponse
    {
        $this->authorize('delete', $user);
        $user->delete();

        return $this->responseOk('User has been deleted.');
    }
}
