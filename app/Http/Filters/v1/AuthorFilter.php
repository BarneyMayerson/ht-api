<?php

declare(strict_types=1);

namespace App\Http\Filters\v1;

use Illuminate\Database\Eloquent\Builder;

/**
 * @extends QueryFilter<\App\Models\User>
 */
class AuthorFilter extends QueryFilter
{
    /**
     * Filter by id.
     *
     * @return Builder<\App\Models\User>
     */
    public function id(string $value)
    {
        return $this->builder->whereIn('id', explode(',', (string) $value));
    }

    /**
     * Filter by email.
     *
     * @return Builder<\App\Models\User>
     */
    public function email(string $value)
    {
        $likeStr = str_replace('*', '%', $value);

        return $this->builder->where('email', 'like', $likeStr);
    }

    /**
     * Filter by name.
     *
     * @return Builder<\App\Models\User>
     */
    public function name(string $value)
    {
        $likeStr = str_replace('*', '%', $value);

        return $this->builder->where('name', 'like', $likeStr);
    }
}
