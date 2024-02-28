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

        $passengers = $request->input('passengers');



        $availableCars = Car::whereDoesntHave('bookings', function ($query) use ($validatedData) {
            $query->where(function ($query) use ($validatedData) {
                $query->whereBetween('start_date', [$validatedData['start_date'], $validatedData['end_date']])
                    ->orWhereBetween('end_date', [$validatedData['start_date'], $validatedData['end_date']]);
            })->orWhere(function ($query) use ($validatedData) {
                $query->where('start_date', '<', $validatedData['start_date'])
                    ->where('end_date', '>', $validatedData['end_date']);
            });
        })->get();


        $availableCars = $availableCars->filter(function ($car) use ($passengers) {
            return $car->max_passengers >= $passengers;
        });


        return view('dashboard', [
            'availableCars' => $availableCars,
            'user' => $user,
            'startDate' => $validatedData['start_date'],
            'endDate' => $validatedData['end_date'],
            'passengers' => $passengers,
        ]);
    }
}
