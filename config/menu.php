<?php

use App\View\Components\Menu;

return fn() => [
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
