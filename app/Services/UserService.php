<?php

namespace App\Services;

use App\Models\User;
use Exception;

class UserService
{
    public function __construct(protected User $user)
    {
    }

    public function delete(): void
    {
        if (auth()->user()->id == $this->user->id) {
            throw new Exception('Nie możesz usunąć użytkownika, na którym jesteś aktualnie zalogowany.');
        }
        if (!$this->user->delete()) {
            throw new Exception('Could not delete this user.');
        }
    }
}
