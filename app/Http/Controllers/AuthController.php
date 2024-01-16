<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\UserLoginEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if ($user = User::where(['email' => $request->get('email')])->first()) {
            $userLoginEntry = new UserLoginEntry;
            $userLoginEntry->ip = request()->ip();
            $userLoginEntry->user_id = $user->id;

            if (Auth::attempt($request->only('email', 'password'), true)) {
                $userLoginEntry->success = 1;
                $userLoginEntry->save();

                if (Auth::user()->hasRole('admin')) {
                    return redirect()->route('dashboard');
                }
                Auth::logout();
                Session::flush();

                return redirect()->route('login')
                    ->withErrors((new MessageBag)->add('login-error', 'Not enough privileges.'))
                    ->withInput();
            } else {
                $userLoginEntry->success = 0;
                $userLoginEntry->save();
            }
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
