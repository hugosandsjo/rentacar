<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class DeleteBookingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Booking $booking)
    {
        $booking->delete();
        return redirect('/dashboard');
    }
}
