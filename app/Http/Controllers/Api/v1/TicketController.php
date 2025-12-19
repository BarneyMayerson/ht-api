<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\ReplaceTicketRequest;
use App\Http\Requests\Api\v1\StoreTicketRequest;
use App\Http\Requests\Api\v1\UpdateTicketRequest;
use App\Http\Resources\v1\TicketResource;
use App\Models\Ticket;
use App\Models\User;
use App\Policies\Api\v1\TicketPolicy;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TicketController extends ApiController
{
    protected string $policyClass = TicketPolicy::class;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection<int, TicketResource>
     */
    public function index()
    {
        if ($this->include('author')) {
            return TicketResource::collection(Ticket::query()->withRequest()->with('author')->get());
        }

        return TicketResource::collection(Ticket::query()->withRequest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request): JsonResponse|TicketResource
    {
        try {
            User::findOrFail($request->input('data.relationships.author.data.id'));

            $this->authorize('store', Ticket::class);

            return TicketResource::make(Ticket::create($request->mappedAttributes()));
        } catch (ModelNotFoundException) {
            return $this->responseOk('User not found.', [
                'error' => 'The provided user id does not exists.',
            ]);
        } catch (AuthorizationException) {
            return $this->error('You are not authorized to store that resource', Response::HTTP_UNAUTHORIZED);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(int $ticketId): JsonResponse|TicketResource
    {
        try {
            $ticket = Ticket::findOrFail($ticketId);

            if ($this->include('author')) {
                return new TicketResource($ticket->load('author'));
            }

            return TicketResource::make($ticket);
        } catch (ModelNotFoundException) {
            return $this->error('Ticket not found', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, int $ticketId): JsonResponse|TicketResource
    {
        try {
            $ticket = Ticket::findOrFail($ticketId);

            $this->authorize('update', $ticket);
            $ticket->update($request->mappedAttributes());

            return TicketResource::make($ticket);
        } catch (ModelNotFoundException) {
            return $this->error('Ticket not found', Response::HTTP_NOT_FOUND);
        } catch (AuthorizationException) {
            return $this->error('You are not authorized to update that resource', Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Replace the specified resource in storage.
     */
    public function replace(ReplaceTicketRequest $request, int $ticketId): JsonResponse|TicketResource
    {
        try {
            $ticket = Ticket::findOrFail($ticketId);

            $this->authorize('replace', $ticket);
            $ticket->update($request->mappedAttributes());

            return TicketResource::make($ticket);
        } catch (ModelNotFoundException) {
            return $this->error('Ticket not found', Response::HTTP_NOT_FOUND);
        } catch (AuthorizationException) {
            return $this->error('You are not authorized to replace that resource', Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $ticketId): JsonResponse
    {
        try {
            $ticket = Ticket::findOrFail($ticketId);

            $this->authorize('delete', $ticket);
            $ticket->delete();

            return $this->responseOk('Ticket has been deleted.');
        } catch (ModelNotFoundException) {
            return $this->error('Ticket not found', Response::HTTP_NOT_FOUND);
        } catch (AuthorizationException) {
            return $this->error('You are not authorized to delete that resource', Response::HTTP_UNAUTHORIZED);
        }
    }
}
