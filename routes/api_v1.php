<?php

use App\Http\Controllers\Api\v1\AuthorController;
use App\Http\Controllers\Api\v1\AuthorTicketsController;
use App\Http\Controllers\Api\v1\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('tickets', TicketController::class)->middleware('auth:sanctum');
Route::apiResource('authors', AuthorController::class)->middleware('auth:sanctum');
Route::apiResource('authors.tickets', AuthorTicketsController::class)->middleware('auth:sanctum');

Route::get('/user', fn (Request $request) => $request->user())->middleware('auth:sanctum');
