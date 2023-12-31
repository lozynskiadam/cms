<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'), true)) {
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('dashboard');
            }
            Auth::logout();
            Session::flush();

            return redirect()->route('login')
                ->withErrors((new MessageBag)->add('login-error', 'Not enough privileges.'))
                ->withInput();
        }

        return redirect()->route('login')
            ->withErrors((new MessageBag)->add('login-error', 'Email or password is incorrect.'))
            ->withInput();
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('login');
    }
}
