<?php

namespace App\Livewire\Users;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class Details extends Component
{
    public User $user;

    public string $name;

    public string $email;

    public UserStatus $status;

    public array $roles = [];

    public function rules(): array
    {
        return [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'status' => [new Enum(UserStatus::class)],
        ];
    }

    public function mount(): void
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->status = $this->user->status;
        $this->roles = $this->user->getRoleNames()->toArray();
    }

    public function update(): void
    {
        $this->validate();

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->status = $this->status;
        $this->user->save();
        $this->user->syncRoles($this->roles);

        $this->updateHeader($this->name);
        $this->updateBreadcrumb($this->name);
        $this->toast('Użytkownik został zaaktualizowany');
        $this->closeModal();
    }

    protected function updateHeader(string $value): void
    {
        $this->js("$('.header-title').text('{$value}');");
    }

    protected function updateBreadcrumb(string $value): void
    {
        $this->js("$('.breadcrumb-item.active').text('{$value}');");
    }

    protected function closeModal(): void
    {
        $this->js("bootstrap.Modal.getInstance(document.querySelector('#user-edit-modal')).hide();");
    }

    protected function toast(string $value): void
    {
        $this->js("
            toastr['success']('{$value}', null, {
                positionClass: 'toast-bottom-right',
                progressBar: true,
            });
        ");
    }
}
