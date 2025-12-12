<?php

declare(strict_types=1);

namespace App\Models;

use App\Http\Queries\v1\TicketQuery;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    /**
     * @return BelongsTo<\App\Models\User, $this>
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Applies filters from the query.
     *
     * @param  Builder<\App\Models\Ticket>  $query
     * @return Builder<\App\Models\Ticket>
     */
    public function scopeWithRequest(Builder $query): Builder
    {
        return new TicketQuery(request())->apply($query);
    }
}
