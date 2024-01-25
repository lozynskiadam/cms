<?php

namespace App\Livewire\Users\Components;

use App\Enums\UserStatus;
use App\Models\User;
use App\View\Components\ModalComponent;
use Illuminate\Validation\Rules\Enum;

class EditModal extends ModalComponent
{
    public User $user;

    public array $roles;

    public function title(): string
    {
        return 'Edytuj';
    }

    public function setup(User $user): void
    {
        $this->user = $user;
        $this->roles = $this->user->getRoleNames()->toArray();
    }

    public function rules(): array
    {
        return [
            'user.name' => 'required|min:5',
            'user.email' => 'required|email',
            'user.status' => [new Enum(UserStatus::class)],
        ];
    }

    public function submit(): void
    {
        $this->validate();

        $this->user->save();
        $this->user->syncRoles($this->roles);

        $this->toast("User \"{$this->user->name}\" has been updated successfully.", 'success');
        $this->dispatch('$refresh');
        $this->close();
    }
}
