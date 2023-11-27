<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public User $user;

    public function rules()
    {
        return [
            'user.name' => 'required|min:5',
            'user.email' => 'required|email',
        ];
    }

    public function render()
    {
        return view('livewire.edit-user')->section('content')->extends('layouts.master', [
            'title' => $this->user->name,
            'breadcrumbs' => [
                ['label' => 'Strona domowa', 'url' => route('dashboard')],
                ['label' => 'Lista użytkowników', 'url' => route('users.index')],
                ['label' => $this->user->name],
            ]
        ]);
    }

    public function update()
    {
        $this->validate();

        $this->user->save();

        $this->js('$(".header-title").text("' . $this->user->name . '");');
        $this->js('$(".breadcrumb-item.active").text("' . $this->user->name . '");');
        $this->js("toastr['success']('Użytkownik został zaaktualizowany.', null, {
            positionClass: 'toast-bottom-right',
            progressBar: true,
        });");
    }
}
