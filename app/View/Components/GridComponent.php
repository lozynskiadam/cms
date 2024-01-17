<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

abstract class GridComponent extends Component
{
    public int $currentPage = 1;

    public int $lastPage;

    public int $perPage = 10;

    public Collection $entries;

    abstract public function columns(): array;

    abstract public function dataSource(): Relation|Builder;

    public function mount(): void
    {
        $this->fetch();
    }

    public function fetch(): void
    {
        $this->entries = $this->dataSource()->offset($this->perPage * ($this->currentPage - 1))->limit($this->perPage)->get();
        $this->lastPage = ceil($this->dataSource()->count() / $this->perPage);
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

    public function render(): View
    {
        return view('livewire.grid');
    }
}
