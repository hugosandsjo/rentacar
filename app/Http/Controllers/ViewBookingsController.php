<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ViewBookingsController extends Controller
{

    public function __invoke(Request $request)
    {

        $user = Auth::user();
        return view('update', compact('user'));
    }
}
