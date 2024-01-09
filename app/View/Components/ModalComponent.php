<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\On;
use Livewire\Component;
use ReflectionClass;

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
        foreach ((new ReflectionClass(static::class))->getMethod('setup')->getParameters() as $parameter) {
            $property = $parameter->getName();
            $class = $parameter->getType()->getName();
            $isBuiltIn = $parameter->getType()->isBuiltin();
            $value = $data[$property] ?? null;

            $arguments[$property] = match (true) {
                !is_null($value) && is_subclass_of($class, Model::class) => $class::find($value),
                !is_null($value) => $value,
                $parameter->isDefaultValueAvailable() => $parameter->getDefaultValue(),
                !$isBuiltIn => new $class,
                default => null
            };
        }

        return $arguments ?? [];
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
