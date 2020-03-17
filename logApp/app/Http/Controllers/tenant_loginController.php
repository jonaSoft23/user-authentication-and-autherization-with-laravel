<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Tenant_LoginRequest; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Tenant_LoginController extends Controller
{
    public function show()
    {
        return view('tenant_login');
    }

    public function authenticate(Request $requestFields)
    {
        // Returned validated fields also contain the csrf token,
        // therefore, we pick only email and password.
        $attributes = $requestFields->only(['email', 'password']);

        if (Auth::attempt($attributes)) {
            return redirect()->route('first');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return back();
    }

}

