<?php

namespace App\Livewire\Dashboard\Pages;

use App\View\Components\PageComponent;
use Illuminate\View\View;

class Index extends PageComponent
{
    public function getView(): View
    {
        return view('livewire.dashboard.index');
    }

    public function getTitle(): string
    {
        return 'Dashboard';
    }

    public function getBreadcrumbs(): array
    {
        return [
            ['label' => 'Strona domowa'],
        ];
    }
}
