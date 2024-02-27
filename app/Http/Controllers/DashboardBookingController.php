<?php

namespace App\Http\Controllers;

use App\Models\UpdateBooking;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;


class DashboardBookingController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $user = Auth::user();
        $booking = Booking::find($id);
        return view('update', ['booking' => $booking]);
    }
}
