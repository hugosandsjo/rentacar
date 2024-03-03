<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CreateBookingController;
use App\Http\Controllers\DeleteBookingController;
use App\Http\Controllers\UpdateBookingController;
use App\Http\Controllers\SearchCars;
use App\Http\Controllers\ViewBookingsController;

Route::view('/', 'index')->name('login');

Route::patch('/bookings/{booking}', UpdateBookingController::class)->name('booking.update');

Route::post('login', LoginController::class);
Route::post('bookings', CreateBookingController::class);
Route::post('/view-bookings', ViewBookingsController::class);

Route::get('dashboard', DashboardController::class);
Route::get('/logout', LogoutController::class);
Route::get('/search-cars', [SearchCars::class, 'searchCars'])->name('cars.search');

Route::delete('bookings/{booking}/delete', DeleteBookingController::class)->name('booking.destroy');

// Unused?
