<?php

namespace App\Livewire\Users\Pages;

use App\View\Components\PageComponent;
use Illuminate\View\View;

class Index extends PageComponent
{
    public function getView(): View
    {
        return view('livewire.users.index');
    }

    public function getTitle(): string
    {
        return 'Użytkownicy';
    }

    public function getBreadcrumbs(): array
    {
        return [
            ['label' => 'Strona domowa', 'url' => route('dashboard')],
            ['label' => 'Użytkownicy'],
        ];
    }

    public function getButtons(): array
    {
        return [
            ['label' => 'Dodaj', 'modal' => 'users.components.edit-modal'],
            ['label' => 'Generuj', 'dispatch' => 'factory'],
        ];
    }
}
