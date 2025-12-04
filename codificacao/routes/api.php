<?php

use App\Http\Controllers\Api\BarbeariaController;

Route::prefix('api')->middleware('auth:sanctum')->group(function () {
    Route::get('barbearias/{id}/barbeiros', [BarbeariaController::class, 'getBarbeiros']);
});