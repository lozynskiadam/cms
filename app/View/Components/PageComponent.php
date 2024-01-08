<?php

namespace App\View\Components;

use Illuminate\View\View;
use Livewire\Component;

abstract class PageComponent extends Component
{
    protected $listeners = [
        '$refresh'
    ];

    public function render()
    {
        return $this->getView()
            ->extends('layouts.master', [
                'title' => $this->getTitle(),
                'breadcrumbs' => $this->getBreadcrumbs(),
                'buttons' => $this->getButtons()
            ])
            ->section('content');
    }

    abstract protected function getView(): View;

    abstract protected function getTitle(): string;

    protected function getBreadcrumbs(): array
    {
        return [];
    }

    protected function getButtons(): array
    {
        return [];
    }

    protected function updateHeader(string $value): void
    {
        $this->js("$('.header-title').text('{$value}');");
    }

    protected function updateBreadcrumb(string $value): void
    {
        $this->js("$('.breadcrumb-item.active').text('{$value}');");
    }

    protected function closeModal(string $selector): void
    {
        $this->js("bootstrap.Modal.getInstance(document.querySelector('$selector')).hide();");
    }

    protected function toast(string $message, string $type): void
    {
        $this->js("
            toastr['$type']('{$message}', null, {
                positionClass: 'toast-bottom-right',
                progressBar: true,
            });
        ");
    }
}
