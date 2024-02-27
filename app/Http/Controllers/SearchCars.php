<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class SearchCars extends Controller
{
    public function SearchCars(Request $request)
    {
        // Validate the form input (start and end dates)
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $user = $request->user(); // Get the currently authenticated user



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
