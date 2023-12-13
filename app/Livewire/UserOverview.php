<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserOverview extends Component
{
    public User $user;

    protected $listeners = [
        '$refresh'
    ];
}
