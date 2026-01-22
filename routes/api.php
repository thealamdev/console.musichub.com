<?php

use App\Http\Controllers\SongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(SongController::class)->group(function () {
    Route::get('/songs', 'index');
    Route::post('/song', 'store');
    Route::get('/songs/{id}', 'show');
    Route::put('/songs/{id}', 'update');
    Route::delete('/songs/{id}', 'destroy');
});
