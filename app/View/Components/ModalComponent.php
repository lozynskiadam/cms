<?php

namespace App\View\Components;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

abstract class ModalComponent extends Component
{
    public bool $initialized = false;

    public function getModalId(): string
    {
        return str_replace('.', '--', $this->getName());
    }

    #[On('open')]
    public function open(array $data = []): void
    {
        $this->js("Livewire.modal.open('{$this->getModalId()}', " . json_encode($data) . ")");
    }

    #[On('close')]
    public function close(): void
    {
        $this->js("Livewire.modal.close('{$this->getModalId()}')");
    }

    #[On('initialize')]
    public function initialize(array $data = []): void
    {
        if (method_exists(static::class, 'setup')) {
            $this->setup(...$this->resolveSetupArguments($data));
        }
        $this->initialized = true;
    }

    #[On('terminate')]
    public function terminate(): void
    {
        $this->initialized = false;
    }

    private function resolveSetupArguments($data): array
    {
        $user = isset($data['user']) ? User::find($data['user']) : new User;

        return [
            'user' => $user,
        ];
    }

    public function toast(string $message, string $type): void
    {
        $message = addslashes($message);
        $message = htmlentities($message);
        $this->js("
            toastr['$type']('{$message}', null, {
                positionClass: 'toast-bottom-right',
                progressBar: true,
            });
        ");
    }
}
