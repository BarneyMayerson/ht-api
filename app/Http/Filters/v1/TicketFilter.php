<?php

declare(strict_types=1);

namespace App\Http\Filters\v1;

use Illuminate\Database\Eloquent\Builder;

class TicketFilter extends QueryFilter
{
    public function status(string $values): Builder
    {
        return $this->builder->whereIn('status', explode(',', $values));
    }
}
