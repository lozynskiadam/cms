<?php

namespace App\Livewire\Users\Components;

use App\Models\User;
use App\Models\UserLoginAttempt;
use App\View\Components\GridComponent;
use Illuminate\Database\Eloquent\Relations\Relation;

class LoginHistory extends GridComponent
{
    public User $user;

    public function dataSource(): Relation
    {
        return $this->user->loginAttempts()->orderBy('created_at', 'desc');
    }

    public function columns(): array
    {
        return [
            [
                'label' => 'Data',
                'value' => fn(UserLoginAttempt $attempt) => $attempt->created_at
            ],
            [
                'label' => 'IP',
                'value' => fn(UserLoginAttempt $attempt) => $attempt->ip
            ],
            [
                'label' => 'Efekt',
                'value' => function (UserLoginAttempt $attempt) {
                    if ($attempt->success) {
                        return '<i class="fa fa-check text-success"></i>';
                    }

                    return '<i class="fa fa-ban text-danger"></i>';
                }
            ]
        ];
    }
}
