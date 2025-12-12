<?php

declare(strict_types=1);

namespace App\Http\Queries\v1;

use Illuminate\Database\Eloquent\Builder;

/**
 * @extends QueryFilter<\App\Models\User>
 */
class AuthorQuery extends Query
{
    protected array $sortable = ['id', 'name', 'email', 'created_at', 'updated_at'];

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
