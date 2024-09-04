<?php
// Author: Amjad Kayed

use App\Http\Controllers\ReviewController;

Route::get('/reviews', [ReviewController::class, 'index']); 
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/reviews', [ReviewController::class, 'store']); 
    Route::put('/reviews/{id}', [ReviewController::class, 'update']); 
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']); 
});

Route::get('/reviews/{id}', [ReviewController::class, 'show']);
