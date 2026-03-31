<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(SongController::class)->group(function () {
        Route::get('/songs', 'index');
        Route::post('/song', 'store');
        Route::get('/song/{song}', 'show');
        Route::put('/song/{song}', 'update');
        Route::delete('/song/{song}', 'destroy');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index');
        Route::post('/category', 'store');
        Route::get('/category/{category}', 'show');
        Route::put('/category/{category}', 'update');
        Route::delete('/category/{category}', 'destroy');
    });
});


// ami je tomar