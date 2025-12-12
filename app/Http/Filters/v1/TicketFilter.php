<?php

declare(strict_types=1);

namespace App\Http\Filters\v1;

use Illuminate\Database\Eloquent\Builder;

/**
 * @extends QueryFilter<\App\Models\Ticket>
 */
class TicketFilter extends QueryFilter
{
    protected array $sortable = ['title', 'status', 'created_at', 'updated_at'];

    /**
     * Filter by status (you can pass one or more separated by commas).
     *
     * @return Builder<\App\Models\Ticket>
     */
    public function status(string $values): Builder
    {
        return $this->builder->whereIn('status', explode(',', $values));
    }

    /**
     * Filter by title.
     *
     * @return Builder<\App\Models\Ticket>
     */
    public function title(string $value)
    {
        $likeStr = str_replace('*', '%', $value);

        return $this->builder->where('title', 'like', $likeStr);
    }
}
