<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Alert;
use App\Services\UserService;
use Exception;
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
        try {
            (new UserService($user))->delete();
        } catch (Exception $exception) {
            Alert::danger($exception->getMessage());
            return redirect(route('users.index'));
        }

        Alert::success("User \"{$user->name}\" has been deleted successfully.");

        return redirect(route('users.index'));
    }
}
