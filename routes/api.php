<?php

use App\Http\Controllers\ActivoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});


// Rutas para ActivosController 
Route::group([
    'middleware' => 'api',
    'prefix' => 'activos'
], function () {
    Route::post('/', [ActivoController::class, 'store']);
    Route::put('/{id}', [ActivoController::class, 'update']);
    Route::get('/', [ActivoController::class, 'index']);
    Route::delete('/{id}', [ActivoController::class, 'destroy']);
});
