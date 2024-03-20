<?php

namespace App\Livewire\Modules\Pages;

use App\View\Components\PageComponent;
use Illuminate\View\View;

class Index extends PageComponent
{
    public function getView(): View
    {
        return view('livewire.modules.index');
    }

    public function getTitle(): string
    {
        return 'Moduły';
    }

    public function getBreadcrumbs(): array
    {
        return [
            ['label' => 'Strona domowa', 'url' => route('dashboard')],
            ['label' => 'Moduły'],
        ];
    }
}
