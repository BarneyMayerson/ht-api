<?php

use App\Http\Controllers\Api\v1\AuthorController;
use App\Http\Controllers\Api\v1\AuthorTicketsController;
use App\Http\Controllers\Api\v1\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function (): void {
    Route::apiResource('tickets', TicketController::class)->except(['update']);
    Route::put('tickets/{ticket}', [TicketController::class, 'replace']);

    Route::apiResource('authors.tickets', AuthorTicketsController::class)->except(['update']);

    Route::apiResource('authors', AuthorController::class);

    Route::get('/user', fn (Request $request) => $request->user());
});
