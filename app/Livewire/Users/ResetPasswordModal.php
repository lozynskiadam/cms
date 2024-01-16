<?php

namespace App\Livewire\Users;

use App\Enums\ModalSize;
use App\Models\User;
use App\View\Components\ModalComponent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordModal extends ModalComponent
{
    public User $user;

    public ?string $newPassword = null;

    public function title(): string
    {
        return 'Reset hasła';
    }

    public function size(): ModalSize
    {
        return ModalSize::SMALL;
    }

    public function setup(User $user): void
    {
        $this->user = $user;
        $this->newPassword = null;
    }

    public function submit(): void
    {
        $this->newPassword = Str::random();
        $this->user->password = Hash::make($this->newPassword);
        $this->user->save();
        $this->toast('Hasło zostało zmienione', 'success');
    }
}
