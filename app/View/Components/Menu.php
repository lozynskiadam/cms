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
                Menu::item(label: 'Aplikacja'),

                Menu::item(
                    label: 'Strona WWW',
                    icon: 'ti ti-globe',
                    url: '#',
                    active: false,
                    items: [
                        Menu::item(
                            label: 'Edytor stron',
                            url: '#',
                            active: false,
                        ),
                        Menu::item(
                            label: 'Udostępnione pliki',
                            url: '#',
                            active: false,
                        ),
                        Menu::item(
                            label: 'Przekierowania',
                            url: '#',
                            active: false,
                        ),
                    ]
                ),
                Menu::item(
                    label: 'Blog',
                    icon: 'ti ti-license',
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
                Menu::item(
                    label: 'Promocje',
                    icon: 'ti ti-tag',
                    url: '#',
                    active: false,
                ),

                Menu::item(label: 'Administracja'),

                Menu::item(
                    label: 'Użytkownicy',
                    icon: 'ti ti-users',
                    url: route('users.index'),
                    active: Menu::isCurrentRoute(['users.index', 'users.preview']),
                ),
                Menu::item(
                    label: 'Zgłoszenia',
                    icon: 'ti ti-address-book',
                    url: '#',
                    active: false,
                ),
                Menu::item(
                    label: 'Ustawienia',
                    icon: 'ti ti-settings',
                    url: route('settings.index'),
                    active: Menu::isCurrentRoute(['settings.index']),
                ),
                Menu::item(
                    label: 'Serwer i dane',
                    icon: 'ti ti-server',
                    items: [
                        Menu::item(
                            label: 'Pliki',
                            url: route('files.index'),
                            active: Menu::isCurrentRoute(['files.index', 'files.preview']),
                        ),
                        Menu::item(
                            label: 'Subskrybenci',
                            url: '#',
                            active: false,
                        ),
                        Menu::item(
                            label: 'Wysłane maile',
                            url: '#',
                            active: false
                        ),
                        Menu::item(
                            label: 'Logi',
                            url: '#',
                            active: false
                        ),
                    ]
                ),
                Menu::item(
                    label: 'Narzędzia roota',
                    icon: 'ti ti-lock',
                    items: [
                        Menu::item(
                            label: 'Moduły',
                            url: '#',
                            active: false
                        ),
                        Menu::item(
                            label: 'Domyślni użytkownicy',
                            url: '#',
                            active: false
                        ),
                        Menu::item(
                            label: 'Role',
                            url: '#',
                            active: false
                        ),
                        Menu::item(
                            label: 'Kolejka',
                            url: '#',
                            active: false
                        ),
                        Menu::item(
                            label: 'Newslettery',
                            url: '#',
                            active: false
                        ),
                        Menu::item(
                            label: 'Cache',
                            url: '#',
                            active: false
                        ),
                    ]
                ),
            ],
            'root' => true,
        ]);
    }

    public static function item(
        string $label = null,
        string $icon = null,
        string $url = null,
        string $badge = null,
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
            'badge' => $badge ?? false,
            'active' => $active ?? false,
            'items' => $items ?? [],
        ];
    }

    public static function isCurrentRoute(array|string $names): bool
    {
        return in_array(app('request')->route()->getName(), (array)$names);
    }
}
