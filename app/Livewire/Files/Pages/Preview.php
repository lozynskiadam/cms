<?php

namespace App\Livewire\Files\Pages;

use App\Models\File;
use App\View\Components\PageComponent;
use Illuminate\View\View;

class Preview extends PageComponent
{
    public File $file;

    public function getView(): View
    {
        return view('livewire.files.preview');
    }

    public function getTitle(): string
    {
        return $this->file->name;
    }

    public function getBreadcrumbs(): array
    {
        return [
            ['label' => 'Strona domowa', 'url' => route('dashboard')],
            ['label' => 'Pliki', 'url' => route('files.index')],
            ['label' => $this->file->name],
        ];
    }
}
