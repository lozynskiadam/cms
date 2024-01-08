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
