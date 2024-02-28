<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CreateBookingController;
use App\Http\Controllers\DeleteBookingController;
use App\Http\Controllers\DashboardBookingController;
use App\Http\Controllers\UpdateBookingController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\BookingController;
use App\Models\UpdateBooking;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\CarController;
use App\Http\Controllers\SearchCars;
use App\Http\Controllers\ViewBookingsController;

Route::view('/', 'index')->name('login');

Route::patch('/bookings/{booking}', UpdateBookingController::class);

Route::post('login', LoginController::class);
Route::post('bookings', CreateBookingController::class);

Route::get('dashboard', DashboardController::class);
Route::get('/logout', LogoutController::class);



Route::delete('bookings/{booking}/delete', DeleteBookingController::class);

Route::patch('/bookings/{booking}', UpdateBookingController::class);


Route::post('/view-bookings', ViewBookingsController::class);


Route::get('/search-cars', [SearchCars::class, 'searchCars'])->name('cars.search');


Route::get('/dashboard/bookings/{id}/edit', DashboardBookingController::class)->name('dashboard.bookings.edit');
Route::get('/bookings/{booking}/edit', [DashboardBookingController::class, 'edit'])->name('bookings.edit');
