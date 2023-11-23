<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.users.index', [
            'models' => User::all()
        ]);
    }

    public function view(User $user)
    {
        return view('pages.users.view', [
            'model' => $user
        ]);
    }
}
