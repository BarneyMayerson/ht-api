<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::prefix('v1')->as('v1.')->group(base_path('routes/api_v1.php'));
Route::prefix('v2')->as('v2.')->group(base_path('routes/api_v2.php'));
