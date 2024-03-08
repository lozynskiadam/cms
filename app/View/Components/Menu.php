<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Menu extends Component
{
    public function render(): View
    {
        return view('components.menu-items', [
            'items' => [
                Menu::item(label: 'Strona WWW'),

                Menu::item(
                    label: 'Edytor stron',
                    icon: 'ti ti-table-row',
                    url: '#',
                    active: false,
                ),

                Menu::item(
                    label: 'Udostępnione pliki',
                    icon: 'ti ti-share',
                    url: '#',
                    active: false,
                ),

                Menu::item(
                    label: 'Przekierowania',
                    icon: 'ti ti-arrow-bounce',
                    url: '#',
                    active: false,
                ),

                Menu::item(label: 'Blog'),

                Menu::item(
                    label: 'Posty',
                    icon: 'ti ti-license',
                    url: '#',
                    active: false,
                ),

                Menu::item(
                    label: 'Autorzy',
                    icon: 'ti ti-user-edit',
                    url: '#',
                    active: false,
                ),

                Menu::item(label: 'Sklep'),

                Menu::item(
                    label: 'Produkty',
                    icon: 'ti ti-cube',
                    url: '#',
                    active: false,
                ),

                Menu::item(
                    label: 'Zamówienia',
                    icon: 'ti ti-shopping-cart',
                    url: '#',
                    active: false,
                ),

                Menu::item(label: 'Dane w aplikacji'),

                Menu::item(
                    label: 'Użytkownicy',
                    icon: 'ti ti-users',
                    url: route('users.index'),
                    active: Menu::isCurrentRoute(['users.index', 'users.preview']),
                ),

                Menu::item(
                    label: 'Pliki',
                    icon: 'ti ti-files',
                    url: route('files.index'),
                    active: Menu::isCurrentRoute(['files.index', 'files.preview']),
                ),
                Menu::item(
                    label: 'Ustawienia',
                    icon: 'ti ti-settings',
                    url: route('settings.index'),
                    active: Menu::isCurrentRoute(['settings.index']),
                ),
            ],
            'root' => true,
        ]);
    }

    public static function item(
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

    public static function isCurrentRoute(array|string $names): bool
    {
        return in_array(app('request')->route()->getName(), (array)$names);
    }
}
