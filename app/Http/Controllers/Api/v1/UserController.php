<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\v1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection<int, UserResource>
     */
    public function index()
    {
        if ($this->include('tickets')) {
            return UserResource::collection(User::with('tickets')->paginate());
        }

        return UserResource::collection(User::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): UserResource
    {
        if ($this->include('tickets')) {
            return UserResource::make($user->load('tickets'));
        }

        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): void
    {
        //
    }
}
