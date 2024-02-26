<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CreateBookingController;
use App\Http\Controllers\DeleteBookingController;


Route::view('/', 'index')->name('login');

Route::post('login', LoginController::class);

Route::get('dashboard', DashboardController::class);
Route::get('/logout', LogoutController::class);

Route::post('bookings', CreateBookingController::class);
Route::delete('bookings/{booking}/delete', DeleteBookingController::class);
