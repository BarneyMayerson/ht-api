<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\v1\UserResource;
use App\Models\User;

class AuthorController extends ApiController
{
    /**
     * Get paginated authors.
     *
     * Displays authors. This means that users who have created at least one ticket.
     *
     * @group Managing Authors
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection<int, UserResource>
     */
    public function index()
    {
        if ($this->include('tickets')) {
            return UserResource::collection(
                User::query()
                    ->has('tickets')
                    ->withRequest()
                    ->with('tickets')
                    ->get()
            );
        }

        return UserResource::collection(User::query()->has('tickets')->withRequest()->get());
    }

    /**
     * Show a specific author.
     *
     * @queryParam include string Relationship(s) to including. Separate multiple relationships with commas. Not existing relationship will be ignored. Example: tickets
     *
     * @group Managing Authors
     */
    public function show(User $author): UserResource
    {
        if ($this->include('tickets')) {
            return UserResource::make($author->load('tickets'));
        }

        return UserResource::make($author);
    }
}
