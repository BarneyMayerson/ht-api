<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\ReplaceTicketRequest;
use App\Http\Requests\Api\v1\StoreTicketRequest;
use App\Http\Requests\Api\v1\UpdateTicketRequest;
use App\Http\Resources\v1\TicketResource;
use App\Models\Ticket;
use App\Policies\Api\v1\TicketPolicy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthorTicketsController extends ApiController
{
    protected string $policyClass = TicketPolicy::class;

    /**
     * Create a ticket of author.
     *
     * @group Managing Author-Tickets
     *
     * @response 200
     */
    public function store(StoreTicketRequest $request, int $authorId): JsonResponse|TicketResource
    {
        try {
            $this->authorize('store', Ticket::class);

            return TicketResource::make(Ticket::create(
                $request->mappedAttributes(['user_id' => $authorId])
            ));
        } catch (AuthorizationException) {
            return $this->error('You are not authorized to create that resource', Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Update a specific ticket of author.
     *
     * Updates any fields of the ticket.
     *
     * @group Managing Author-Tickets
     *
     * @response 200
     */
    public function update(int $authorId, int $ticketId, UpdateTicketRequest $request): JsonResponse|TicketResource
    {
        try {
            $ticket = Ticket::query()->where('user_id', $authorId)->findOrFail($ticketId);
            $ticket->update($request->mappedAttributes());

            return TicketResource::make($ticket);
        } catch (ModelNotFoundException) {
            return $this->error('Your ticket not found', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Replace a specific ticket of author.
     *
     * Updates all fields of the ticket.
     *
     * @group Managing Author-Tickets
     *
     * @response 200
     */
    public function replace(int $authorId, int $ticketId, ReplaceTicketRequest $request): JsonResponse|TicketResource
    {
        try {
            $ticket = Ticket::query()->where('user_id', $authorId)->findOrFail($ticketId);
            $ticket->update($request->mappedAttributes());

            return TicketResource::make($ticket);
        } catch (ModelNotFoundException) {
            return $this->error('Your ticket not found', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Delete a specific ticket of author.
     *
     * @group Managing Author-Tickets
     *
     * @response 200
     */
    public function destroy(int $authorId, int $ticketId): JsonResponse
    {
        try {
            $ticket = Ticket::query()->where('user_id', $authorId)->findOrFail($ticketId);
            $ticket->delete();

            return $this->responseOk('Ticket has been deleted.');
        } catch (ModelNotFoundException) {
            return $this->error('Ticket not found', Response::HTTP_NOT_FOUND);
        }
    }
}
