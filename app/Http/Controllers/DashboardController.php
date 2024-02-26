<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __invoke(Request $request)
    {
        $cars = \App\Models\Car::all();
        $user = Auth::user();
        return view('dashboard', compact('user'), compact('cars'));
    }
}
