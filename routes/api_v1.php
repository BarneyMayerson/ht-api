<?php

use App\Http\Controllers\Api\v1\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('tickets', TicketController::class);

Route::get('/user', fn (Request $request) => $request->user())->middleware('auth:sanctum');
