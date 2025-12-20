<?php

declare(strict_types=1);

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[\Override]
    public function toArray(Request $request): array
    {
        /** @var \App\Models\User $user */
        $user = $this->resource;

        return [
            'type' => 'user',
            'id' => $user->id,
            'attributes' => [
                'name' => $user->name,
                'email' => $user->email,
                'isManager' => $user->is_manager,
                $this->mergeWhen($request->routeIs('v1.authors.*'), [
                    'emailVerifiedAt' => $user->email_verified_at,
                    'emailCreatedAt' => $user->created_at,
                    'emailUpdateddAt' => $user->updated_at,
                ]),
            ],
            'includes' => [TicketResource::collection($this->whenLoaded('tickets'))],
            'links' => [
                'self' => route('v1.authors.show', $user),
            ],
        ];
    }
}
