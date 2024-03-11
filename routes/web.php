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
use App\Http\Controllers\CreateUser;
use App\Http\Controllers\Signup;
use Illuminate\Support\Facades\Auth;



Route::view('/', 'index')->name('login');


Route::patch('/bookings/{booking}', UpdateBookingController::class)->name('booking.update')->middleware('auth'); //test done

Route::post('login', LoginController::class); //test done
Route::post('/createuser', CreateUser::class)->name('createuser'); //test done
Route::post('bookings', CreateBookingController::class)->middleware('auth'); //test done
Route::post('/view-bookings', ViewBookingsController::class)->middleware('auth'); //test done


// Route::get('signup', Signup::class);
Route::get('dashboard', DashboardController::class)->middleware('auth'); //test done
Route::get('/logout', LogoutController::class); //test done
Route::get('/search-cars', [SearchCars::class, 'searchCars'])->name('cars.search'); //test done

Route::get('/login', function () {
    return view('login');
})->name('login'); //test done

Route::get('/signup', function () {
    return view('signup');
})->name('signup'); //test done

Route::delete('bookings/{booking}/delete', DeleteBookingController::class)->name('booking.destroy')->middleware('auth');; //test done
