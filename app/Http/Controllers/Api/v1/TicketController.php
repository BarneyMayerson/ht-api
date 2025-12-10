<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\StoreTicketRequest;
use App\Http\Requests\Api\v1\UpdateTicketRequest;
use App\Http\Resources\v1\TicketResource;
use App\Models\Ticket;

class TicketController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection<int, TicketResource>
     */
    public function index()
    {
        if ($this->include('author')) {
            return TicketResource::collection(Ticket::with('user')->paginate());
        }

        return TicketResource::collection(Ticket::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket): TicketResource
    {
        if ($this->include('author')) {
            return new TicketResource($ticket->load('user'));
        }

        return TicketResource::make($ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket): void
    {
        //
    }
}
