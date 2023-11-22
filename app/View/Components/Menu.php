<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Menu extends Component
{
    public function getItems(): array
    {
        return [
            Menu::item(
                label: 'Home',
                icon: 'fas fa-home',
                url: route('login'),
                active: Menu::isCurrentRoute('login')
            ),
            Menu::item(
                label: 'Użytkownicy',
                icon: 'fas fa-users',
                items: [
                    Menu::item(
                        label: 'Lista użytkowników',
                        url: route('dashboard'),
                        active: Menu::isCurrentRoute('dashboard')
                    ),
                    Menu::item(
                        label: 'Role i uprawnienia',
                        url: route('dashboard'),
                        active: Menu::isCurrentRoute('dashboard')
                    ),
                ],
            ),
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.menu-items', [
            'items' => $this->getItems(),
            'root' => true,
        ]);
    }

    private static function item(
        string $label = null,
        string $icon = null,
        string $url = null,
        bool   $active = null,
        array  $items = null,
    ): array
    {
        $item = [
            'id' => "menu_" . Str::random(),
            'label' => $label ?? false,
            'icon' => $icon ?? false,
            'url' => $url ?? false,
            'active' => $active ?? false,
            'items' => $items ?? [],
        ];

        foreach ($item['items'] as $subitem) {
            if ($subitem['active']) {
                $item['active'] = true;
            }
        }

        return $item;
    }

    private static function isCurrentRoute(string $name): bool
    {
        return $name === app('request')->route()->getName();
    }
}
