<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\StoreTicketRequest;
use App\Http\Resources\v1\TicketResource;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthorTicketsController extends ApiController
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection<int, TicketResource>
     */
    public function index(int $author_id)
    {
        return TicketResource::collection(
            Ticket::where('user_id', $author_id)
                ->withRequest()
                ->paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $author_id, StoreTicketRequest $request): JsonResponse|TicketResource
    {
        $model = [
            'title' => $request->input('data.attributes.title'),
            'description' => $request->input('data.attributes.description'),
            'status' => $request->input('data.attributes.status'),
            'user_id' => $author_id,
        ];

        return TicketResource::make(Ticket::create($model));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $authorId, int $ticketId): JsonResponse
    {
        try {
            $ticket = Ticket::findOrFail($ticketId);

            if ($ticket->user_id == $authorId) {
                $ticket->delete();

                return $this->responseOk('Ticket has been deleted.');
            }

            return $this->error('Ticket not found', Response::HTTP_NOT_FOUND);
        } catch (ModelNotFoundException) {
            return $this->error('Ticket not found', Response::HTTP_NOT_FOUND);
        }
    }
}
