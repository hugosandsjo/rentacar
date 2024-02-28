<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class SearchCars extends Controller
{
    public function SearchCars(Request $request)
    {

        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $user = $request->user();

        $passangers = $request->input('passangers');



        $availableCars = Car::whereDoesntHave('bookings', function ($query) use ($validatedData) {
            $query->where(function ($query) use ($validatedData) {
                $query->whereBetween('start_date', [$validatedData['start_date'], $validatedData['end_date']])
                    ->orWhereBetween('end_date', [$validatedData['start_date'], $validatedData['end_date']]);
            })->orWhere(function ($query) use ($validatedData) {
                $query->where('start_date', '<', $validatedData['start_date'])
                    ->where('end_date', '>', $validatedData['end_date']);
            });
        })->get();



        return view('dashboard', [
            'availableCars' => $availableCars,
            'user' => $user,
            'startDate' => $validatedData['start_date'],
            'endDate' => $validatedData['end_date']
        ]);
    }
}
