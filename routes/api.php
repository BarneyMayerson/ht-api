<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => response()->json([
    'message' => 'Hi, API.',
], 200));

Route::get('/user', fn (Request $request) => $request->user())->middleware('auth:sanctum');
