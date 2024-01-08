<?php

namespace App\View\Components;

use Livewire\Component;

abstract class ModalComponent extends Component
{
    protected function closeModal(string $selector): void
    {
        $this->js("bootstrap.Modal.getInstance(document.querySelector('$selector')).hide();");
    }

    protected function toast(string $message, string $type): void
    {
        $this->js("
            toastr['$type']('{$message}', null, {
                positionClass: 'toast-bottom-right',
                progressBar: true,
            });
        ");
    }
}
