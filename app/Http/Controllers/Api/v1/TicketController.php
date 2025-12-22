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
        $this->authorize('store', Ticket::class);

        return TicketResource::make(Ticket::create($request->mappedAttributes()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket): JsonResponse|TicketResource
    {
        if ($this->include('author')) {
            return TicketResource::make($ticket->load('author'));
        }

        return TicketResource::make($ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket): JsonResponse|TicketResource
    {
        $this->authorize('update', $ticket);
        $ticket->update($request->mappedAttributes());

        return TicketResource::make($ticket);
    }

    /**
     * Replace the specified resource in storage.
     */
    public function replace(ReplaceTicketRequest $request, Ticket $ticket): JsonResponse|TicketResource
    {
        $this->authorize('replace', $ticket);
        $ticket->update($request->mappedAttributes());

        return TicketResource::make($ticket);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket): JsonResponse
    {
        $this->authorize('delete', $ticket);
        $ticket->delete();

        return $this->responseOk('Ticket has been deleted.');
    }
}
