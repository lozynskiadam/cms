<?php

namespace App\Livewire;

use Livewire\Component;

class Confirmation extends Component
{
    public string $url;

    public string $method;

    public string $message;

    public string $submitLabel;

    protected $listeners = [
        'confirm' => 'open'
    ];

    public function open(
        string $url = null,
        string $method = null,
        string $message = null,
        string $submitLabel = null,
    ): void
    {
        $this->url = $url ?? '/';
        $this->method = $method ?? 'POST';
        $this->message = $message ?? 'Czy na pewno chcesz wykonać tą akcję?';
        $this->submitLabel = $submitLabel ?? 'Wykonaj';

        $this->js("
            const modal = document.getElementById('confirm-modal');
            bootstrap.Modal.getOrCreateInstance(modal).show();
        ");
    }
}
