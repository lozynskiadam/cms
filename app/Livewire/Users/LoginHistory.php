<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Models\UserLoginEntry;
use App\View\Components\GridComponent;
use Illuminate\Database\Eloquent\Relations\Relation;

class LoginHistory extends GridComponent
{
    public User $user;

    public function dataSource(): Relation
    {
        return $this->user->loginEntries();
    }

    public function columns(): array
    {
        return [
            [
                'label' => 'Data',
                'value' => fn(UserLoginEntry $entry) => $entry->created_at
            ],
            [
                'label' => 'IP',
                'value' => fn(UserLoginEntry $entry) => $entry->ip
            ],
            [
                'label' => 'Efekt',
                'value' => function (UserLoginEntry $entry) {
                    if ($entry->success) {
                        return '<i class="fa fa-check text-success"></i>';
                    }

                    return '<i class="fa fa-ban text-danger"></i>';
                }
            ]
        ];
    }
}
