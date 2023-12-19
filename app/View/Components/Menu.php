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
                label: 'Dashboard',
                icon: 'ti ti-home',
                url: route('dashboard'),
                active: Menu::isCurrentRoute('dashboard')
            ),
            Menu::item(
                label: 'Użytkownicy',
                icon: 'ti ti-users',
                url: route('users.index'),
                active: Menu::isCurrentRoute(['users.index', 'users.view']),
            ),
            Menu::item(
                label: 'Pliki',
                icon: 'ti ti-files',
                url: route('files.index'),
                active: Menu::isCurrentRoute(['files.index', 'files.view']),
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
        foreach ($items ?? [] as $item) {
            if ($item['active']) {
                $active = true;
            }
        }

        return [
            'id' => "menu_" . Str::random(),
            'label' => $label ?? false,
            'icon' => $icon ?? false,
            'url' => $url ?? false,
            'active' => $active ?? false,
            'items' => $items ?? [],
        ];
    }

    private static function isCurrentRoute(array|string $names): bool
    {
        return in_array(app('request')->route()->getName(), (array)$names);
    }
}
