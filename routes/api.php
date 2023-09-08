<?php

use App\Http\Controllers\PersonController;

Route::get('/ping', fn () => response()->json(['message' => 'pong']));

Route::prefix('pessoas')->controller(PersonController::class)->group(function () {
    Route::get('/', 'search');
    Route::post('/', 'create');
    Route::get('{person}', 'show');
    Route::get('contagem-pessoas', 'count');
});
