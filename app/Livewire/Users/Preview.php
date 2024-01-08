<?php

namespace App\Livewire\Users;

use App\Enums\UserStatus;
use App\Models\User;
use App\Services\Alert;
use App\Services\UserService;
use App\View\Components\PageComponent;
use Exception;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class Preview extends PageComponent
{
    public User $user;

    public User $formUser;

    public array $roles = [];

    public function getView(): View
    {
        return view('livewire.users.preview');
    }

    public function getTitle(): string
    {
        return $this->user->name;
    }

    public function getBreadcrumbs(): array
    {
        return [
            ['label' => 'Strona domowa', 'url' => route('dashboard')],
            ['label' => 'Użytkownicy', 'url' => route('users.index')],
            ['label' => $this->user->name],
        ];
    }

    public function rules(): array
    {
        return [
            'formUser.name' => 'required|min:5',
            'formUser.email' => 'required|email',
            'formUser.status' => [new Enum(UserStatus::class)],
        ];
    }

    public function mount(): void
    {
        $this->formUser = clone $this->user;
        $this->roles = $this->user->getRoleNames()->toArray();
    }

    public function update(): void
    {
        $this->validate();

        $this->formUser->save();
        $this->formUser->syncRoles($this->roles);
        $this->user = $this->formUser;

        $this->updateHeader($this->user->name);
        $this->updateBreadcrumb($this->user->name);
        $this->toast(message: 'Użytkownik został zaktualizowany', type: 'success');
        $this->closeModal('#user-edit-modal');
    }

    public function delete(): void
    {
        try {
            (new UserService($this->user))->delete();
            Alert::success("User \"{$this->user->name}\" has been deleted successfully.");
            $this->redirect(route('users.index'));
        } catch (Exception $exception) {
            $this->toast(message: $exception->getMessage(), type: 'error');
            $this->closeModal('#user-delete-modal');
        }
    }
}
