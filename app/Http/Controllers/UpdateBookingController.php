<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateBookingController extends Controller
{

    public function __invoke(Request $request, Booking $booking)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'passengers' => 'required|integer|min:1',
            'car_id' => 'required|integer|exists:cars,id', // Assuming 'cars' is the table name and 'id' is the column name
        ]);

        $booking->update($validatedData);

        return view('update', ['booking' => $booking, 'user' => $user]);
    }
}
