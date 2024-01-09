<?php

namespace App\Livewire\Files;

use App\Models\File;
use App\View\Components\PageComponent;
use Illuminate\View\View;

class Index extends PageComponent
{
    public File $user;

    public function getView(): View
    {
        return view('livewire.files.index');
    }

    public function getTitle(): string
    {
        return 'Pliki';
    }

    public function getBreadcrumbs(): array
    {
        return [
            ['label' => 'Strona domowa', 'url' => route('dashboard')],
            ['label' => 'Pliki'],
        ];
    }

    public function getButtons(): array
    {
        return [
            ['label' => 'Wgraj', 'modal' => 'files.upload-modal'],
            ['label' => 'Generuj', 'dispatch' => 'factory'],
        ];
    }
}
