<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/akun/{username}', [AuthController::class, 'getAkun']);

Route::get('/tikets', [TiketController::class, 'index']);
Route::post('/tikets', [TiketController::class, 'store']);
Route::put('/tikets/{id}', [TiketController::class, 'update']);

Route::get('/bookings', [BookingController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);
Route::put('/bookings/{id}', [BookingController::class, 'update']);
