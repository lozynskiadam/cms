<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\View\Components\PageComponent;
use Illuminate\View\View;

class Preview extends PageComponent
{
    public User $user;

    public function getView(): View
    {
        return view('livewire.users.preview');
    }

    public function getTitle(): string
    {
        return $this->user->name;
    }

    public function getBreadcrumbs(): array
    {
        return [
            ['label' => 'Strona domowa', 'url' => route('dashboard')],
            ['label' => 'Użytkownicy', 'url' => route('users.index')],
            ['label' => $this->user->name],
        ];
    }
}
