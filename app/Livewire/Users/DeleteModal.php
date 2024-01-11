<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Services\Alert;
use App\Services\UserService;
use App\View\Components\ModalComponent;
use Exception;

class DeleteModal extends ModalComponent
{
    public User $user;

    public function title(): string
    {
        return 'Usuń';
    }

    public function setup(User $user): void
    {
        $this->user = $user;
    }

    public function submit(): void
    {
        try {
            (new UserService($this->user))->delete();
            Alert::success("User \"{$this->user->name}\" has been deleted successfully.");
            $this->redirect(route('users.index'));
        } catch (Exception $exception) {
            $this->toast($exception->getMessage(), 'error');
        }
        $this->close();
    }
}
