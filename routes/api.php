<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SongController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(SongController::class)->group(function () {
    Route::get('/songs', 'index');
    Route::post('/song', 'store');
    Route::get('/song/{id}', 'show');
    Route::put('/song/{id}', 'update');
    Route::delete('/song/{id}', 'destroy');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::post('/category', 'store');
    Route::get('/category/{id}', 'show');
    Route::put('/category/{id}', 'update');
    Route::delete('/category/{id}', 'destroy');
});
