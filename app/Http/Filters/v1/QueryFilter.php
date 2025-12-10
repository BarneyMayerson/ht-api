<?php

declare(strict_types=1);

namespace App\Http\Filters\v1;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Base class for query filtering
 *
 * @template TModel of \Illuminate\Database\Eloquent\Model
 */
abstract class QueryFilter
{
    /** @var Builder<TModel> */
    protected Builder $builder;

    public function __construct(protected Request $request)
    {
        // $this->builder will be set in apply()
    }

    /**
     * Applies all filters from the current Request.
     *
     * @param  Builder<TModel>  $builder
     * @return Builder<TModel>
     */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->request->all() as $param => $value) {
            if (method_exists($this, $param)) {
                $this->$param($value);
            }
        }

        return $builder;
    }

    /**
     * Helper method if you want to call filters manually.
     *
     * @param  array<string, mixed>  $filters
     * @return Builder<TModel>
     */
    protected function filter(array $filters): Builder
    {
        foreach ($filters as $param => $value) {
            if (method_exists($this, $param)) {
                $this->$param($value);
            }
        }

        return $this->builder;
    }
}
