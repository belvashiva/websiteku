<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cosmetics', [ApiController::class, 'index']);
    Route::post('/cosmetics', [ApiController::class, 'store']);
    Route::get('/cosmetics/{id}', [ApiController::class, 'show']);
    Route::put('/cosmetics/{id}', [ApiController::class, 'update']);
    Route::delete('/cosmetics/{id}', [ApiController::class, 'destroy']);
});
