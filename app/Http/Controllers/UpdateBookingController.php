<?php

namespace App\Http\Controllers;

use App\Models\UpdateBooking;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;


class UpdateBookingController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        return view('update', compact('user',));
    }
}
