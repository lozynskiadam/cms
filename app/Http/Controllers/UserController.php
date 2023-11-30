<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Alert;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('pages.users.index');
    }

    public function view(User $user): View
    {
        return view('pages.users.view', [
            'model' => $user
        ]);
    }

    public function delete(User $user): RedirectResponse
    {
        if (auth()->user()->id == $user->id) {
            Alert::danger('Nie możesz usunąć użytkownika, na którym jesteś aktualnie zalogowany.');
            return redirect(route('users.index'));
        }

        $user->delete();
        Alert::success("User \"{$user->name}\" has been deleted successfully.");

        return redirect(route('users.index'));
    }
}
