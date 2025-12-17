<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\ReplaceTicketRequest;
use App\Http\Requests\Api\v1\StoreTicketRequest;
use App\Http\Requests\Api\v1\UpdateTicketRequest;
use App\Http\Resources\v1\TicketResource;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

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
        } catch (ModelNotFoundException) {
            return $this->responseOk('User not found.', [
                'error' => 'The provided user id does not exists.',
            ]);
        }

        $model = [
            'title' => $request->input('data.attributes.title'),
            'description' => $request->input('data.attributes.description'),
            'status' => $request->input('data.attributes.status'),
            'user_id' => $request->input('data.relationships.author.data.id'),
        ];

        return TicketResource::make(Ticket::create($model));
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
    public function update(UpdateTicketRequest $request, Ticket $ticket): void
    {
        //
    }

    /**
     * Replace the specified resource in storage.
     */
    public function Replace(ReplaceTicketRequest $request, int $ticketId): JsonResponse|TicketResource
    {
        try {
            $ticket = Ticket::findOrFail($ticketId);
            $ticket->update($request->all()['data']['attributes']);

            return TicketResource::make($ticket);
        } catch (ModelNotFoundException) {
            return $this->error('Ticket not found', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $ticketId): JsonResponse
    {
        try {
            $ticket = Ticket::findOrFail($ticketId);
            $ticket->delete();

            return $this->responseOk('Ticket has been deleted.');
        } catch (ModelNotFoundException) {
            return $this->error('Ticket not found', Response::HTTP_NOT_FOUND);
        }
    }
}
