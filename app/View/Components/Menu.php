<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Menu extends Component
{
    protected array $items = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $currentRoute = app('request')->route()->getName();

        $this->items = [
            [
                'label' => 'Home',
                'icon' => 'fas fa-home',
                'url' => route('login'),
                'active' => $currentRoute == route('login')
            ],
            [
                'label' => 'Użytkownicy',
                'icon' => 'fas fa-users',
                'items' => [
                    [
                        'label' => 'Lista użytkowników',
                        'url' => route('dashboard'),
                        'active' => $currentRoute == route('login')
                    ],
                    [
                        'label' => 'Role i uprawnienia',
                        'url' => route('login'),
                        'active' => $currentRoute == route('login')
                    ]
                ]
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->decorateItems($this->items);

        return view('components.menu', [
            'items' => $this->items,
        ]);
    }

    protected function decorateItems(array &$items): void
    {
        foreach ($items as &$item) {
            $item['id'] = Str::uuid();
            $item['active'] ??= false;
            $item['icon'] ??= false;
            $item['url'] ??= false;
            $item['items'] ??= [];
            $this->decorateItems($item['items']);
            foreach ($item['items'] as $subitem) {
                if ($subitem['active']) {
                    $item['active'] = true;
                }
            }
        }
    }
}
