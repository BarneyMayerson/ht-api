<?php

declare(strict_types=1);

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[\Override]
    public function toArray(Request $request): array
    {
        /** @var \App\Models\Ticket $ticket */
        $ticket = $this->resource;

        return [
            'type' => 'ticket',
            'id' => $ticket->id,
            'attributes' => [
                'title' => $ticket->title,
                'description' => $this->when(
                    ! $request->routeIs(['v1.tickets.index', 'v1.authors.tickets.index']),
                    $ticket->description
                ),
                'status' => $ticket->status,
                'createdAt' => $ticket->created_at,
                'updatedAt' => $ticket->updated_at,
            ],
            'relationships' => [
                'author' => [
                    'data' => [
                        'type' => 'user',
                        'id' => $ticket->user_id,
                    ],
                    'links' => [
                        'self' => route('v1.authors.show', [
                            'author' => $ticket->user_id,
                        ]),
                    ],

                ],
            ],
            'includes' => UserResource::make($this->whenLoaded('author')),
            'links' => [
                'self' => route('v1.tickets.show', ['ticket' => $ticket->id]),
            ],
        ];
    }
}
