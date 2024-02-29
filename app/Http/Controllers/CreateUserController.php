<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateUserController extends Controller
{

    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        } else {
            return back()->withErrors([
                'Whoops! Please try to login again.'
            ]);
        }
    }
}
