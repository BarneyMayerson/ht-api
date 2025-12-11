<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\v1\TicketResource;
use App\Models\Ticket;

class AuthorTicketsController extends ApiController
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection<int, TicketResource>
     */
    public function index(int $author_id)
    {
        return TicketResource::collection(
            Ticket::where('user_id', $author_id)
                ->filter()
                ->paginate()
        );
    }
}
