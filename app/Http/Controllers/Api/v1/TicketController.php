<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\ReplaceTicketRequest;
use App\Http\Requests\Api\v1\StoreTicketRequest;
use App\Http\Requests\Api\v1\UpdateTicketRequest;
use App\Http\Resources\v1\TicketResource;
use App\Models\Ticket;
use App\Policies\Api\v1\TicketPolicy;
use Illuminate\Http\JsonResponse;

class TicketController extends ApiController
{
    protected string $policyClass = TicketPolicy::class;

    /**
     * Get paginated tickets.
     *
     * @group Managing Tickets
     *
     * @queryParam sort string Data field(s) to sort by. Separate multiple fields with commas. Denote descending sort with a minus. Example: sort=title,-createdAt
     * @queryParam filter[status] Filter by status code: A, C, X, H. No-example
     * @queryParam filter[title] Filter by title. Wildcards are supported. Example: *sit*
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection<int, TicketResource>
     */
    public function index()
    {
        if ($this->include('author')) {
            return TicketResource::collection(Ticket::query()->withRequest()->with('author')->paginate());
        }

        return TicketResource::collection(Ticket::query()->withRequest()->paginate());
    }

    /**
     * Create a ticket
     *
     * Creates a new ticket record. Users can only create tickets for themselves.
     *
     * @group Managing Tickets
     *
     * @response 200 {
        "data": {
            "type": "ticket",
            "id": 72,
            "attributes": {
                "title": "Custom Ticket 01",
                "description": "Description of Custom Ticket 01",
                "status": "A",
                "createdAt": "2025-12-23T11:30:59.000000Z",
                "updatedAt": "2025-12-23T11:30:59.000000Z"
            },
            "relationships": {
                "author": {
                    "data": {
                        "type": "user",
                        "id": 6
                    },
                    "links": {
                        "self": "http://hta.lan/api/v1/authors/6"
                    }
                }
            },
            "links": {
                "self": "http://hta.lan/api/v1/tickets/72"
            }
        }
     * }
     */
    public function store(StoreTicketRequest $request): JsonResponse|TicketResource
    {
        $this->authorize('store', Ticket::class);

        return TicketResource::make(Ticket::create($request->mappedAttributes()));
    }

    /**
     * Show a specific ticket.
     *
     * Display an individual ticket.
     *
     * @group Managing Tickets
     *
     * @queryParam include string Relationship(s) to including. Separate multiple relationships with commas. Not existing relationship will be ignored. Example: author
     *
     * @response 200
     */
    public function show(Ticket $ticket): JsonResponse|TicketResource
    {
        if ($this->include('author')) {
            return TicketResource::make($ticket->load('author'));
        }

        return TicketResource::make($ticket);
    }

    /**
     * Update a specific ticket.
     *
     * Updates various filds of the ticket.
     *
     * @group Managing Tickets
     *
     * @response 200
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket): JsonResponse|TicketResource
    {
        $this->authorize('update', $ticket);
        $ticket->update($request->mappedAttributes());

        return TicketResource::make($ticket);
    }

    /**
     * Replace a specific ticket.
     *
     * Updates all fields of the ticket.
     *
     * @group Managing Tickets
     *
     * @response 200
     */
    public function replace(ReplaceTicketRequest $request, Ticket $ticket): JsonResponse|TicketResource
    {
        $this->authorize('replace', $ticket);
        $ticket->update($request->mappedAttributes());

        return TicketResource::make($ticket);
    }

    /**
     * Delete a specific ticket.
     *
     * Deletes the ticket.
     *
     * @group Managing Tickets
     *
     * @response 200
     */
    public function destroy(Ticket $ticket): JsonResponse
    {
        $this->authorize('delete', $ticket);
        $ticket->delete();

        return $this->responseOk('Ticket has been deleted.');
    }
}
