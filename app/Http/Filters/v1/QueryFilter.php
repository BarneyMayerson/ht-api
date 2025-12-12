<?php

declare(strict_types=1);

namespace App\Http\Filters\v1;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Base class for query filtering
 *
 * @template TModel of \Illuminate\Database\Eloquent\Model
 */
abstract class QueryFilter
{
    /** @var Builder<TModel> */
    protected Builder $builder;

    /** @var string[] */
    protected array $sortable = [];

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

        $filters = $this->request->get('filter', []);

        if (! is_array($filters)) {
            return $builder;
        }

        foreach ($filters as $param => $value) {
            if (! is_string($param)) {
                continue;
            }

            if ($value === null || $value === '') {
                continue;
            }

            if (method_exists($this, $param)) {
                $this->$param($value);
            }
        }

        $sortables = $this->request->filled('sort')
            ? explode(',', $this->request->string('sort')->toString())
            : [];

        foreach ($sortables as $sortable) {
            $direction = str($sortable)->startsWith('-') ? 'desc' : 'asc';
            $column = Str::of($sortable)->remove('-')->snake()->value();

            if (in_array($column, $this->sortable)) {
                $this->builder->orderBy($column, $direction);
            }
        }

        return $builder;
    }
}
