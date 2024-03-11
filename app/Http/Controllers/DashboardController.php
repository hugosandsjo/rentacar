<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PickupLocation;

class DashboardController extends Controller
{

    public function __invoke(Request $request)
    {
        $cars = \App\Models\Car::all();
        $user = Auth::user();
        $pickupLocations = PickupLocation::all();

        return view('dashboard', compact('user', 'cars', 'pickupLocations'));
    }
}
