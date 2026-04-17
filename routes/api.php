<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\SongsManageController;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(SongsManageController::class)->group(function () {
        Route::prefix('super-admin')->name('super-admin.')->group(function () {
            Route::get('/songs', 'index')->name('songs');
        });
    });
    
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
