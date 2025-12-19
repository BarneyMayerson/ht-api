<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponses;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class ApiController extends Controller
{
    use ApiResponses;

    protected string $policyClass;

    public function __construct()
    {
        Gate::guessPolicyNamesUsing(fn () => $this->policyClass);
    }

    public function include(string $relationship): bool
    {
        /** @var string|null $param */
        $param = request()->get('include');

        if (! isset($param)) {
            return false;
        }

        $includeValues = explode(',', strtolower($param));

        return in_array(strtolower($relationship), $includeValues);
    }

    public function isAble(string $ability, Model $targetModel): Response
    {
        Gate::policy($targetModel::class, $this->policyClass);

        return $this->authorize($ability, [$targetModel]);
    }
}
