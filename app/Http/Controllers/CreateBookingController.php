<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateBookingController extends Controller
{

    public function __invoke(Request $request)
    {


        $booking = new Booking;

        $booking->start_date = $request['start_date'];
        $booking->end_date = $request['end_date'];
        $booking->passengers = $request['passengers'];
        $booking->car_id = $request['car_id'];
        $booking->user_id = Auth::id();
        $booking->save();

        return redirect('/dashboard');
    }
}
