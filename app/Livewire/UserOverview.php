<?php

namespace App\Livewire;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class UserOverview extends Component
{
    public User $user;

    public function rules()
    {
        return [
            'user.name' => 'required|min:5',
            'user.email' => 'required|email',
            'user.status' => [new Enum(UserStatus::class)],
        ];
    }

    public function update()
    {
        $this->validate();

        $this->user->save();

        $this->js("
            $('.header-title').text('{$this->user->name}');
            $('.breadcrumb-item.active').text('{$this->user->name}');

            const modal = document.getElementById('user-edit-modal');
            bootstrap.Modal.getInstance(modal).hide();

            toastr['success']('Użytkownik został zaaktualizowany.', null, {
                positionClass: 'toast-bottom-right',
                progressBar: true,
            });
        ");
    }

    public function delete()
    {
        $this->js("
            const modal = document.getElementById('user-delete-modal');
            bootstrap.Modal.getInstance(modal).hide();

            toastr['success']('Użytkownik został usunięty.', null, {
                positionClass: 'toast-bottom-right',
                progressBar: true,
            });
        ");
    }
}
