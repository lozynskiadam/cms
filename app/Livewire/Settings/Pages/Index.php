<?php

namespace App\Livewire\Settings\Pages;

use App\View\Components\PageComponent;
use Illuminate\View\View;

class Index extends PageComponent
{
    public function getView(): View
    {
        return view('livewire.settings.index');
    }

    public function getTitle(): string
    {
        return 'Ustawienia';
    }

    public function getBreadcrumbs(): array
    {
        return [
            ['label' => 'Strona domowa', 'url' => route('dashboard')],
            ['label' => 'Ustawienia'],
        ];
    }
}
