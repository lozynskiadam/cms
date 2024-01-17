<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class LoginHistory extends Component
{
    public User $user;

    public int $currentPage = 1;

    public int $lastPage;

    public int $perPage = 10;

    public Collection $entries;

    public function mount(): void
    {
        $this->fetch();
    }

    public function fetch(): void
    {
        $this->entries = $this->user->loginEntries()->offset($this->perPage * ($this->currentPage - 1))->limit($this->perPage)->get();
        $this->lastPage = ceil($this->user->loginEntries()->count() / $this->perPage);
    }

    public function previousPage(): void
    {
        if ($this->currentPage <= 1) {
            $this->currentPage = 1;
            return;
        }

        $this->currentPage--;
        $this->fetch();
    }

    public function nextPage(): void
    {
        if ($this->currentPage >= $this->lastPage) {
            $this->currentPage = $this->lastPage;
            return;
        }

        $this->currentPage++;
        $this->fetch();
    }

    public function setPage(int $page): void
    {
        $this->currentPage = $page;
        $this->fetch();
    }
}
