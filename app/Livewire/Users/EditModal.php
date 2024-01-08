<?php

namespace App\Livewire\Users;

use App\Enums\UserStatus;
use App\Models\User;
use App\View\Components\ModalComponent;
use Illuminate\Validation\Rules\Enum;

class EditModal extends ModalComponent
{
    public User $user;

    public array $roles;

    public function rules(): array
    {
        return [
            'user.name' => 'required|min:5',
            'user.email' => 'required|email',
            'user.status' => [new Enum(UserStatus::class)],
        ];
    }

    public function mount(): void
    {
        $this->roles = $this->user->getRoleNames()->toArray();
    }

    public function update(): void
    {
        $this->validate();

        $this->user->save();
        $this->user->syncRoles($this->roles);

        $this->dispatch('$refresh');
        $this->closeModal('#user-edit-modal');
    }
}
