<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;
use LaravelJsonApi\Laravel\Routing\Relationships;
use LaravelJsonApi\Laravel\Routing\ResourceRegistrar;

Route::get('/user', fn (Request $request) => $request->user())->middleware('auth:sanctum');

JsonApiRoute::server('v2')->resources(function (ResourceRegistrar $server): void {
    $server->resource('posts', JsonApiController::class)
        ->only('index', 'show', 'store')
        ->relationships(function (Relationships $relations): void {
            $relations->hasOne('author')->readOnly();
            $relations->hasMany('comments')->readOnly();
            $relations->hasMany('tags')->readOnly();
        });
});
