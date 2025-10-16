<?php


use App\Http\Controllers\Api\Auth\FileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('file')->group(function () {
        Route::post('/upload', [FileController::class, 'upload']);
    });
});
