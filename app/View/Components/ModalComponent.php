<?php

namespace App\View\Components;

use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

abstract class ModalComponent extends Component
{
    public static function getModalId(): string
    {
        return Str::slug(Str::kebab(static::class));
    }

    #[On('open')]
    public function open(): void
    {
        $this->js("(new bootstrap.Modal(document.querySelector('#" . static::getModalId() . "'))).show();");
    }

    #[On('close')]
    public function close(): void
    {
        $this->js("bootstrap.Modal.getInstance(document.querySelector('#" . static::getModalId() . "')).hide();");
    }

    public function toast(string $message, string $type): void
    {
        $this->js("
            toastr['$type']('{$message}', null, {
                positionClass: 'toast-bottom-right',
                progressBar: true,
            });
        ");
    }
}
